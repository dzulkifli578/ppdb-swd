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

<!-- Script -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalId = 'notificationModal';
        let title = '';
        let message = '';

        @if (session('sukses'))
            title = 'Sukses';
            message = '{{ session('sukses') }}';
        @elseif (session('tidak_ditemukan'))
            title = 'Error';
            message = '{{ session('tidak_ditemukan') }}';
        @endif

        if (title && message) {
            document.getElementById(modalId + 'Title').innerText = title;
            document.getElementById(modalId + 'Message').innerText = message;
            document.getElementById(modalId).showModal();
        }
    });
</script>
