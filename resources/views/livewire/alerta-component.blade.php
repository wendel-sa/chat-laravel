<div>

    <div class="mx-5 my-3 position-fixed top-0 end-0 alert bg-info d-none" role="alert" style="z-index: 9999;" id="alerta">
        <p class="lead mb-0">
            <i class="bx bx-check-circle lead me-3"></i>
            <span class="lead">Texto copiado com succeso</span>
        </p>

    </div>

    <script>
        window.addEventListener('alerta', event => {
            let alerta = document.getElementById('alerta');
            alerta.classList.remove('d-none');
            alerta.classList.add('d-flex');
            setTimeout(function() {
                alerta.classList.remove('d-flex');
                alerta.classList.add('d-none');
            }, 5000);
        });
    </script>
</div>
