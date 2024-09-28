<!-- Button -->
<button onclick="document.getElementById('editJurusan{{ $item->id }}').showModal()"
    class="btn btn-warning font-medium">
    Edit
</button>

<!-- Modal -->
<dialog id="editJurusan{{ $item->id }}" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">Edit Jurusan</h3>
        <form id="editJurusanForm" action="{{ route('edit-jurusan', ['id' => $item->id]) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <!-- Nama Jurusan -->
            <div class="form-control">
                <label for="judul" class="label">
                    <span class="label-text">Nama Jurusan</span>
                </label>
                <input type="text" id="judul" name="nama" class="input input-bordered w-full"
                    value="{{ $item->nama }}" placeholder="Masukkan nama jurusan..." required />
            </div>

            <!-- Deskripsi -->
            <div class="form-control mt-4">
                <label for="isi" class="label">
                    <span class="label-text">Deskripsi</span>
                </label>
                <textarea id="isi" name="deskripsi" rows="4" class="textarea textarea-bordered w-full"
                    placeholder="Masukkan keterangan..." required>{{ $item->deskripsi }}</textarea>
            </div>

            <!-- Gambar -->
            <div class="form-control mt-4">
                <label for="gambar" class="label">
                    <span class="label-text">Gambar</span>
                </label>
                <input type="file" accept=".jpeg, .jpg, .png, .gif" id="gambar" name="gambar"
                    class="file-input file-input-bordered file-input-primary w-full" placeholder="Masukkan gambar..." />
            </div>

            <!-- Tombol Simpan dan Batal -->
            <div class="modal-action">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="button" class="btn btn-secondary"
                    onclick="document.getElementById('editJurusan{{ $item->id }}').close()">Batal</button>
            </div>
        </form>
    </div>
</dialog>
