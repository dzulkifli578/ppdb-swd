<!-- Modal -->
<dialog id="{{ $id }}" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold" id="{{ $id }}Title">{{ $title }}</h3>
        <p id="{{ $id }}Message" class="py-4">{{ $message }}</p>
        <div class="modal-action">
            <button class="btn" onclick="document.getElementById('{{ $id }}').close()">OK</button>
        </div>
    </div>
</dialog>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalId = 'notificationModal';
        let title = '';
        let message = '';

        @if (session('berhasil_tambah'))
            title = 'Sukses';
            message = '{{ session('berhasil_tambah') }}';
        @elseif (session('gagal_tambah'))
            title = 'Error';
            message = '{{ session('gagal_tambah') }}';
        @elseif (session('berhasil_edit'))
            title = 'Sukses';
            message = '{{ session('berhasil_edit') }}';
        @elseif (session('gagal_edit'))
            title = 'Error';
            message = '{{ session('gagal_edit') }}';
        @elseif (session('berhasil_hapus'))
            title = 'Sukses';
            message = '{{ session('berhasil_hapus') }}';
        @elseif (session('gagal_hapus'))
            title = 'Error';
            message = '{{ session('gagal_hapus') }}';
        @endif

        if (title && message) {
            document.getElementById(modalId + 'Title').innerText = title;
            document.getElementById(modalId + 'Message').innerText = message;
            document.getElementById(modalId).showModal();
        }
    });
</script>