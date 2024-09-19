<?php

namespace App\Http\Controllers;
use App\Models\Program;
use App\Models\Registration;
use DB;
use Exception;

class AdminController extends Controller
{
    /**
     * Show the dashboard page for admin.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function dashboard()
    {
        $registration = Registration::join("accounts", "registrations.account_id", "=", "accounts.id")
            ->join("programs", "registrations.program_id", "=", "programs.id")
            ->select("registrations.*", "accounts.username as name", "programs.name as program")
            ->get();

        return view("admin.dashboard", compact("registration"));
    }

    /**
     * Import the CSV file.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importCsv()
    {
        // Validate the request
        $validator = validator(request([
            "csv_file" => "required|mimes:csv"
        ]));

        if ($validator->fails())
            return redirect()->back()->with("validator_fails", "Harus impor file CSV terlebih dahulu");

        // Get the file
        $file = request()->file("csv_file");
        $path = $file->getRealPath();

        // Read the file
        $csvData = file_get_contents($path);

        // Check if the file is UTF-8 with BOM
        if (substr($csvData, 0, 3) == "\xEF\xBB\xBF") {
            $csvData = substr($csvData, 3);
        }

        // Parse the CSV
        $data = array_map('str_getcsv', explode("\n", $csvData));
        $header = array_shift($data);

        \Log::info('Imported Data:', $data);

        // Create the import data
        $importData = [];
        foreach ($data as $row) {
            if (count($row) === count($header)) {
                $importData[] = array_combine($header, $row);
            } else {
                // Log baris yang tidak sesuai
                \Log::warning('Row with unexpected column count:', $row);
            }
        }

        // Log the data to insert
        \Log::info('Data to Insert:', $importData);

        // Insert the data
        try {
            foreach ($importData as $item) {
                \Log::info('Checking item:', $item);

                // Convert the birth_date to Carbon
                $item['birth_date'] = \Carbon\Carbon::createFromFormat('Y-m-d', $item['birth_date'])->format('Y-m-d');

                // Check if the data already exists
                $exists = DB::table('registrations')
                    ->where('nisn', $item['nisn'])
                    ->where('account_id', $item['account_id'])
                    ->exists();

                if (!$exists)
                    DB::table('registrations')->insert($item);
            }

            return redirect()->back()->with("success", "Berhasil mengimpor data!");
        } catch (Exception $e) {
            // Log error untuk debugging
            \Log::error('Import Error:', ['message' => $e->getMessage()]);
            return redirect()->back()->with("error", "Tidak bisa mengimpor data duplikat");
        }
    }

    /**
     * Show the detail page for a registration.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\View
     */
    public function detailPeserta($id)
    {
        $program = Program::all();

        $registration = Registration::join("accounts", "registrations.account_id", "=", "accounts.id")
            ->join("programs", "registrations.program_id", "=", "programs.id")
            ->select("registrations.*", "accounts.username as name", "programs.id as programs_id", "programs.name as program")
            ->where("registrations.id", $id)
            ->first();

        return view("admin.detail-peserta", compact("registration", "program"));
    }

    /**
     * Edit the detail page for a registration.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editDetailPeserta($id)
    {
        $validator = validator(request([
            "nisn" => "required",
            "birth_date" => "required",
            "birth_place" => "required",
            "program_id" => "required",
        ]));

        if ($validator->fails()) {
            // Redirect back with the validator errors
            return redirect()->back()->with("validator_fails", $validator->errors());
        }

        $registration = Registration::where("id", $id)->update([
            "nisn" => request("nisn"),
            "birth_date" => request("birth_date"),
            "birth_place" => request("birth_place"),
            "program_id" => request("program_id"),
        ]);

        if (!$registration) {
            // Redirect back with the failure message
            return redirect()->back()->with("gagal_edit", "Gagal mengedit data peserta");
        }

        return redirect()->back()->with("berhasil_edit", "Berhasil mengedit data peserta");
    }

    /**
     * Delete a registration.
     * 
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function hapusPeserta($id)
    {
        $registration = Registration::where("id", $id)->delete();

        if (!$registration) {
            // Redirect back with the failure message
            return redirect()->back()->with("gagal_hapus", "Gagal menghapus data");
        }

        return redirect()->back()->with("berhasil_hapus", "Berhasil menghapus data");
    }

    /**
     * Generate a PDF of the registrations.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf()
    {
        $registration = Registration::join("accounts", "registrations.account_id", "=", "accounts.id")
            ->join("programs", "registrations.program_id", "=", "programs.id")
            ->select("registrations.*", "accounts.username as name", "programs.name as program")
            ->get();

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView("admin.pdf", compact("registration"));

        return $pdf->download("data-pendaftar.pdf");
    }

    /**
     * Log out the user.
     * 
     * This function will delete the JWT cookie and flush the session. It will then redirect the user to the home page.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout()
    {
        $cookie = cookie("jwt", "", -1);
        session()->flush();
        return redirect()->route("beranda")->with("logout", "Anda berhasil logout")->withCookie($cookie);
    }
}