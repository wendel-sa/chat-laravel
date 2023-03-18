<div>
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <strong class="me-auto">Compartilhar</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body">
                <div>
                    <img src="{{ $qrcode }}" alt="QR Code" class="img-fluid">
                </div>
                <div>
                    <div class="mt-4 pb-lg-3">
                        <input type="text" class="form-control" value="{{ $url }}" readonly>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-lg btn-secondary" onclick="copyToUrl('{{ $url }}')">
                            <i class='bx bx-clipboard me-2'></i>
                            Copiar
                        </button>
                        <a class="btn btn-lg btn-outline-secondary" href="{{ $url }}" target="_blank">
                            <i class='bx bx-link-external me-2'></i>
                            Abrir
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        window.livewire.on('showToast', () => {
            //pegue o toast livetoast e mostre ele sem tempo de expiração
            let toastEl = document.getElementById('liveToast')
            let toast = new bootstrap.Toast(toastEl, {
                delay: 50000
            })
            toast.show()
        })
    </script>

    <script>
        function copyToUrl(text) {
            let texto = text;
            navigator.clipboard.writeText(texto);
            //envia um emit de copia sucesso
            window.livewire.emit('copied');
        }
    </script>

</div>
