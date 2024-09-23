<!-- Table Pengumuman -->
<div class="container overflow-x-auto">
    <table class="table bg-base-100 w-full">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Isi</th>
                <th>Tipe</th>
                <th>Penerima</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="dataTable">
            @foreach ($pengumuman as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->isi }}</td>
                    <td>{{ $item->tipe }}</td>
                    @if ($item->tipe === 'privat')
                        <td>{{ $item->penerima }}</td>
                    @else
                        <td>-</td>
                    @endif
                    <td>
                        @include('admin.pengumuman.edit-pengumuman')
                    </td>
                    <td>
                        <form action="{{ route('hapus-pengumuman', ['id' => $item->id]) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-error font-medium">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
