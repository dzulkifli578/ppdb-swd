<!-- Button -->
<button @click="document.getElementById('{{ $item->id }}').showModal()" class="btn btn-warning font-medium">
    Edit
</button>

<!-- Modal -->
<dialog id="{{ $item->id }}" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">Edit Pengumuman</h3>
        <form id="editPengumumanForm" action="{{ route('edit-pengumuman', ['id' => $item->id]) }}" method="POST">
            @csrf
            @method('PUT')
            <!-- Judul Pengumuman -->
            <div class="form-control">
                <label for="judul" class="label">
                    <span class="label-text">Judul Pengumuman</span>
                </label>
                <input type="text" id="judul" name="judul" class="input input-bordered w-full"
                    value="{{ $item->judul }}" placeholder="Masukkan judul pengumuman..." required />
            </div>

            <!-- Isi Pengumuman -->
            <div class="form-control mt-4">
                <label for="isi" class="label">
                    <span class="label-text">Isi Pengumuman</span>
                </label>
                <textarea id="isi" name="isi" rows="4" class="textarea textarea-bordered w-full"
                    placeholder="Masukkan isi pengumuman..." required>{{ $item->isi }}</textarea>
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
                        @foreach ($akun as $akun)
                            <option value="{{ $akun->id }}">{{ $akun->nama_pengguna }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <!-- Field untuk Tanggal Pengumuman -->
            <div class="form-control mt-4">
                <label for="created_at" class="label">
                    <span class="label-text">Tanggal Pengumuman</span>
                </label>
                <input type="datetime" id="created_at" name="created_at" value="{{ $item->created_at }}"
                    class="input input-bordered w-full" readonly />
            </div>

            <!-- Tombol Simpan dan Batal -->
            <div class="modal-action">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary"
                    @click="document.getElementById('{{ $item->id }}').close()">Batal</button>
            </div>
        </form>
    </div>
</dialog>
