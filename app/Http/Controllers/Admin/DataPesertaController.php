<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Agama;
use App\Models\Akun;
use App\Models\Jurusan;
use App\Models\Registrasi;
use App\Models\Registration;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DB;
use Exception;
use Illuminate\Http\Request;

class DataPesertaController extends Controller
{
    public function dataPeserta(Request $request)
    {
        $header = [
            'name' => 'Data Peserta',
            'breadcrumbs' => 'Data Peserta',
            'route' => route('admin-data-peserta')
        ];

        $registrasi = Registrasi::join("jurusan as jurusan_pertama", "jurusan_pertama_id", "jurusan_pertama.id")
            ->join("jurusan as jurusan_kedua", "jurusan_kedua_id", "jurusan_kedua.id")
            ->join("agama", "agama_id", "agama.id")
            ->select("registrasi.*")
            ->get();

        $jurusan = Jurusan::all();
        return view("admin.data-peserta.data-peserta", compact("header", "registrasi", "jurusan"));
    }

    public function tambahPeserta(Request $request)
    {
        $header = [
            'name' => 'Tambah Data Peserta',
            'breadcrumbs' => [
                ['label' => 'Data Peserta', 'route' => route('admin-data-peserta')],
                ['label' => 'Tambah', 'route' => route('tambah-peserta')],
            ],
            'route' => route('tambah-peserta')
        ];

        $akun = Akun::all();
        $jurusan = Jurusan::all();
        return view("admin.data-peserta.tambah-peserta", compact("header", "akun", "jurusan"));
    }

    public function prosesTambahPeserta(Request $request)
    {
        $validate = $request->validate([
            'nama' => 'required',
            'akun_id' => 'required',
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
            return redirect()->back()->with('berhasil_tambah', 'Berhasil menambahkan data peserta');

        return redirect()->back()->with('gagal_tambah', 'Gagal menambahkan data peserta');
    }

    /**
     * Import the CSV file.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function importCsv(Request $request)
    {
        $request->validate([
            "csv_file" => "required|mimes:csv"
        ]);

        $file = $request->file("csv_file");
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
            $importData = [];

            foreach ($data as $item) {
                $importData[] = [
                    'nisn' => $item['nisn'],
                    'account_id' => $item['account_id'],
                    'birth_date' => Carbon::createFromFormat('Y-m-d', $item['birth_date'])->format('Y-m-d'),
                    // tambahkan kolom lain sesuai kebutuhan
                ];
            }

            DB::table('registrasi')->insert($importData);

            return redirect()->back()->with("success", "Berhasil mengimpor data!");
        } catch (Exception $e) {
            return redirect()->back()->with("error", "Tidak bisa mengimpor data duplikat");
        }
    }

    /**
     * Generate a PDF of the registrations.
     *
     * @return \Illuminate\Http\Response
     */
    public function pdf(Request $request)
    {
        $registrasi = Registrasi::join("akun", "akun_id", "akun.id")
            ->join("jurusan as jurusan_pertama", "jurusan_pertama_id", "jurusan_pertama.id")
            ->join("jurusan as jurusan_kedua", "jurusan_kedua_id", "jurusan_kedua.id")
            ->join("agama", "agama_id", "agama.id")
            ->select("registrasi.*", "jurusan_pertama.nama as nama_jurusan_pertama", "jurusan_kedua.nama as nama_jurusan_kedua")
            ->get();

        $pdf = Pdf::loadView("admin.data-peserta.pdf", compact("registrasi"));

        return $pdf->download("data-pendaftar.pdf");
    }

    public function editPeserta(Request $request, int $id)
    {
        $header = [
            'name' => 'Edit Data Peserta',
            'breadcrumbs' => [
                ['label' => 'Data Peserta', 'route' => route('admin-data-peserta')],
                ['label' => 'Edit', 'route' => route('edit-peserta', compact("id"))],
            ],
            'route' => route('edit-peserta', compact("id"))
        ];

        $registrasi = Registrasi::join("jurusan as jurusan_pertama", "jurusan_pertama_id", "jurusan_pertama.id")
            ->join("jurusan as jurusan_kedua", "jurusan_kedua_id", "jurusan_kedua.id")
            ->join("agama", "agama_id", "agama.id")
            ->select("registrasi.*")
            ->find($id)->first();

        $akun = Akun::all();
        $jurusan = Jurusan::all();
        $agama = Agama::all();

        return view("admin.data-peserta.edit-peserta", compact("header", "registrasi", "akun", "jurusan", "agama"));
    }

    public function prosesEditPeserta(Request $request, int $id)
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
            return redirect()->back()->with('gagal_edit', 'Gagal mengedit data peserta');

        return redirect()->back()->with('berhasil_edit', 'Berhasil mengedit data peserta');
    }

    /**
     * Delete a registration.
     * 
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function hapusPeserta(Request $request, int $id)
    {
        $registration = Registrasi::where("id", $id)->delete();

        if (!$registration) {
            // Redirect back with the failure message
            return redirect()->back()->with("gagal_hapus", "Gagal menghapus data peserta");
        }

        return redirect()->back()->with("berhasil_hapus", "Berhasil menghapus data peserta");
    }
}
