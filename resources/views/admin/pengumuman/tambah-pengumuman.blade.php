<!-- Button -->
<button @click="document.getElementById('tambahPengumuman').showModal()" class="btn btn-primary font-medium">
    Tambah Pengumuman
</button>

<!-- Modal -->
<dialog id="tambahPengumuman" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">Tambah Pengumuman</h3>
        <form id="tambahPengumumanForm" action="{{ route('tambah-pengumuman') }}" method="POST">
            @csrf
            <!-- Judul Pengumuman -->
            <div class="form-control">
                <label for="judul" class="label">
                    <span class="label-text">Judul Pengumuman</span>
                </label>
                <input type="text" id="judul" name="judul" class="input input-bordered w-full"
                    placeholder="Masukkan judul pengumuman..." required />
            </div>

            <!-- Isi Pengumuman -->
            <div class="form-control mt-4">
                <label for="isi" class="label">
                    <span class="label-text">Isi Pengumuman</span>
                </label>
                <textarea id="isi" name="isi" rows="4" class="textarea textarea-bordered w-full"
                    placeholder="Masukkan isi pengumuman..." required></textarea>
            </div>

            <div x-data="{ publikasi: '' }">
                <!-- Tipe Pengumuman -->
                <div class="form-control mt-4">
                    <select name="tipe" class="select select-bordered w-full" x-model="publikasi">
                        <option disabled selected>Tipe</option>
                        <option value="publik" x-data="{ publikasi: 'publik' }">Publik</option>
                        <option value="privat" x-data="{ publikasi: 'privat' }">Privat</option>
                    </select>
                </div>

                <!-- Tipe: Privat -->
                <div class="form-control mt-4" x-show="publikasi === 'privat'">
                    <select name="penerima_id" class="select select-bordered w-full">
                        <option disabled selected>Pilih salah satu</option>
                        @foreach ($akun as $item)
                            <option value="{{ $item->id }}">{{ $item->nama_pengguna }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Tombol Simpan dan Batal -->
            <div class="modal-action">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary"
                    @click="document.getElementById('tambahPengumuman').close();">Batal</button>
            </div>
        </form>
    </div>
</dialog>
