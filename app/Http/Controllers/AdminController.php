<?php

namespace App\Http\Controllers;
use App\Models\Agama;
use App\Models\Akun;
use App\Models\Jurusan;
use App\Models\Pengumuman;
use App\Models\Program;
use App\Models\Registrasi;
use App\Models\Registration;
use Carbon\Carbon;
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
        $header = [
            'name' => 'Dashboard',
            'breadcrumbs' => 'Dashboard',
            'route' => route('admin-dashboard')
        ];

        $registration = Registration::join("accounts", "registrations.account_id", "=", "accounts.id")
            ->join("programs", "registrations.program_id", "=", "programs.id")
            ->select("registrations.*", "accounts.username as name", "programs.name as program")
            ->get();

        return view("admin.dashboard", compact("header", "registration"));
    }

    /**
     * Import the CSV file.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importCsv()
    {
        $validate = request()->validate([
            "csv_file" => "required|mimes:csv"
        ]);

        if (!$validate)
            return redirect()->back()->with("validator_fails", "Harus impor file CSV terlebih dahulu");

        $file = request()->file("csv_file");
        $path = $file->getRealPath();

        $csvData = file_get_contents($path);

        if (substr($csvData, 0, 3) == "\xEF\xBB\xBF")
            $csvData = substr($csvData, 3);

        $data = array_map('str_getcsv', explode("\n", $csvData));
        $header = array_shift($data);

        $importData = [];
        foreach ($data as $row) {
            if (count($row) === count($header))
                $importData[] = array_combine($header, $row);
            else
                \Log::warning('Row with unexpected column count:', $row);
        }

        try {
            foreach ($importData as $item) {
                $item['birth_date'] = Carbon::createFromFormat('Y-m-d', $item['birth_date'])->format('Y-m-d');

                $exists = DB::table('registrations')
                    ->where('nisn', $item['nisn'])
                    ->where('account_id', $item['account_id'])
                    ->exists();

                if (!$exists)
                    DB::table('registrations')->insert($item);
            }

            return redirect()->back()->with("success", "Berhasil mengimpor data!");
        } catch (Exception $e) {
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
     * Show the pengumuman page for admin.
     * 
     * This function will show the pengumuman page for the admin.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function pengumuman()
    {
        $header = [
            'name' => 'Pengumuman',
            'breadcrumbs' => 'Pengumuman',
            'route' => route('pengumuman')
        ];

        $pengumuman = Pengumuman::leftJoin("akun", "penerima_id", "akun.id")
            ->select("pengumuman.*", "akun.nama_pengguna as penerima")
            ->orderBy("id")
            ->get();

        $akun = Akun::all();

        return view("admin.pengumuman", compact("header", "pengumuman", "akun"));
    }

    /**
     * Tambah a pengumuman.
     * 
     * This function will add a pengumuman with the given data.
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function tambahPengumuman()
    {
        $validate = request()->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tipe' => 'required',
            'penerima_id' => 'required_if:tipe,privat'
        ]);

        if (!$validate)
            return redirect()->back()->with('validator_fails', 'Data gagal ditambahkan');

        $pengumuman = Pengumuman::insert($validate);

        if (!$pengumuman)
            return redirect()->back()->with('gagal_edit', 'Gagal menambahkan data pengumuman');

        return redirect()->back()->with('berhasil_edit', 'Berhasil menambahkan data pengumuman');
    }

    /**
     * Edit a pengumuman.
     * 
     * This function will edit a pengumuman with the given id.
     * 
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function editPengumuman($id)
    {
        $validate = request()->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tipe' => 'required',
            'penerima_id' => 'required_if:tipe,privat'
        ]);

        if (!$validate)
            return redirect()->back()->with('validator_fails', 'Data gagal ditambahkan');

        $pengumuman = Pengumuman::where('id', $id)->update($validate);

        if (!$pengumuman)
            return redirect()->back()->with('gagal_edit', 'Gagal mengedit data pengumuman');

        return redirect()->back()->with('berhasil_edit', 'Berhasil mengedit data pengumuman');
    }

    public function hapusPengumuman($id)
    {
        $pengumuman = Pengumuman::find($id)->delete();

        if (!$pengumuman)
            return redirect()->back()->with('gagal_hapus', 'Gagal menghapus data pengumuman');

        return redirect()->back()->with('berhasil_hapus', 'Berhasil menghapus data pengumuman');
    }

    /**
     * Show the data peserta page.
     * 
     * This function will show the data peserta page.
     * 
     * @return \Illuminate\Contracts\View\View
     */
    public function dataPeserta()
    {
        $header = [
            'name' => 'Data Peserta',
            'breadcrumbs' => 'Data Peserta',
            'route' => route('data-peserta')
        ];

        $registrasi = Registrasi::join("jurusan as jurusan_pertama", "jurusan_pertama_id", "jurusan_pertama.id")
            ->join("jurusan as jurusan_kedua", "jurusan_kedua_id", "jurusan_kedua.id")
            ->join("agama", "agama_id", "agama.id")
            ->select("registrasi.*")
            ->get();

        $jurusan = Jurusan::all();
        return view("admin.data-peserta", compact("header", "registrasi", "jurusan"));
    }

    public function tambahPeserta()
    {
        $jurusan = Jurusan::all();
        return view("admin.tambah-peserta", compact("jurusan"));
    }

    public function prosesTambahPeserta()
    {
        $validate = request()->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama_id' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'jurusan_pertama_id' => 'required',
            'jurusan_kedua_id' => 'required',
            'nama_ortu' => 'required',
            'alamat_ortu' => 'required',
            'pekerjaan_ortu' => 'required',
            'no_telepon' => 'required',
        ]);

        $registrasi = Registrasi::insert($validate);

        if (!$registrasi)
            return redirect()->back()->with('failed', 'Data gagal disimpan!');

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }

    public function editPeserta($id)
    {
        $registrasi = Registrasi::join("jurusan as jurusan_pertama", "jurusan_pertama_id", "jurusan_pertama.id")
            ->join("jurusan as jurusan_kedua", "jurusan_kedua_id", "jurusan_kedua.id")
            ->join("agama", "agama_id", "agama.id")
            ->select("registrasi.*")
            ->find($id)->first();

        $jurusan = Jurusan::all();
        $agama = Agama::all();

        return view("admin.edit-peserta", compact("registrasi", "jurusan", "agama"));
    }

    public function prosesEditPeserta($id)
    {
        $validate = request()->validate([
            'nama' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'agama_id' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'jurusan_pertama_id' => 'required',
            'jurusan_kedua_id' => 'required',
            'nama_ortu' => 'required',
            'alamat_ortu' => 'required',
            'pekerjaan_ortu' => 'required',
            'no_telepon' => 'required',
        ]);

        $registrasi = Registrasi::find($id)->update($validate);

        if (!$registrasi)
            return redirect()->back()->with('failed', 'Data gagal diperbarui!');

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
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