<div class="card h-100 border-0 bg-transparent pb-3">
    @if($select)
    <!-- Header -->
    <div class="navbar card-header d-flex align-items-center justify-content-between w-100 p-sm-4 p-3" id="header">
        <div class="d-flex align-items-center pe-3">
            <button type="button" class="navbar-toggler d-lg-none me-3" data-bs-toggle="offcanvas" data-bs-target="#contactsList" aria-controls="contactsList" aria-label="Toggle contacts list">
                <span class="navbar-toggler-icon"></span>
            </button>
            <i class="bi bi-chat rounded-circle" width="40" alt="Albert Flores"></i>
            <h6 class="mb-0 px-1 mx-2">{{$titulo}}</h6>
            <div>
                {{$numMensagens}} - Mensagens
            </div>
        </div>
        <div class="d-flex">

            <button type="button" class="btn btn-outline-danger d-none d-sm-inline-flex px-2 px-sm-3 ms-2" onclick="deleteChat()">
                <i class="bx bx-trash-alt fs-xl me-xl-2"></i>
                <span class="d-none d-xl-inline">Deletar chat</span>
            </button>
        </div>
    </div>

    <div class="navbar card-header d-flex align-items-center justify-content-between w-100 p-sm-4 p-3 d-none" id="headerTrash">
        <div class="d-flex align-items-center pe-3">
            <button type="button" class="navbar-toggler d-lg-none me-3" data-bs-toggle="offcanvas" data-bs-target="#contactsList" aria-controls="contactsList" aria-label="Toggle contacts list">
                <span class="navbar-toggler-icon"></span>
            </button>
            <i class="bi bi-trash rounded-circle" width="40" alt="Albert Flores"></i>
            <h6 class="mb-0 px-1 mx-2">{{$titulo}}</h6>
            <div>
                Você quer mesmo deletar este chat?
            </div>
        </div>
        <div class="d-flex">

            <button type="button" class="btn btn-danger btn-sm d-none d-sm-inline-flex px-2 px-sm-3 ms-2" wire:click="deleteChat">
                <i class="bx bx-trash-alt fs-xl me-xl-2"></i>
                <span class="d-none d-xl-inline">Deletar chat</span>
            </button>

            <button type="button" class="btn btn-sm d-none d-sm-inline-flex px-2 px-sm-3 ms-2" onclick="cancelDelete()">
                <i class="bi bi-x-circle-fill fs-xl me-xl-2"></i>
                <span class="d-none d-xl-inline">Cancelar</span>
            </button>
        </div>
    </div>

    <!-- Messages -->
    <div class="card-body scrollbar-hover w-100 pb-0 overflow-auto" style="max-height: 100vh;" id="mensagens">

        @if($numMensagens > 0)
        @foreach ($messages as $message)
        <!-- Bot message -->

        @if ($message['role'] === 'user')
        <div class="d-flex align-items-start justify-content-end mb-3">
            <div class="pe-2 me-1" style="max-width: 548px">
                <div class="bg-primary text-light p-3 mb-1" style="border-top-left-radius: .5rem; border-bottom-right-radius: .5rem; border-bottom-left-radius: .5rem;">
                    {{ $message['content'] }}
                </div>
                <div class="d-flex justify-content-end align-items-center fs-sm text-muted">
                    {{date('H:i', strtotime($message['created_at']))}}
                </div>
            </div>


            <i class="bx bx-user-circle fs-2 text-muted me-2"></i>

        </div>
        @endif

        @if ($message['role'] === 'assistant')
        <!-- User message -->
        <div class="d-flex align-items-start mb-3">
            <div class="sticky-top ms-xxl-5 ps-lg-4" style="top: 105px !important;">
                <i class="bi bi-lightbulb-fill fs-2 text-white me-2"></i>
            </div>
            <div class="ps-2 ms-1">
                <div class="p-3 mb-1">
                    <pre class="mb-0" style="white-space: pre-wrap; font-family: 'figtree', sans-serif;">
                    {{ $message['content'] }}
                    </pre>
                </div>
                <div class="fs-sm text-muted">
                    {{date('H:i', strtotime($message['created_at']))}}
                </div>
            </div>
        </div>


        @endif

        @endforeach

        @else
        <p class="h4 text-center pt-2">Nenhuma mensagem enviada</p>
        <lottie-player src="{{asset('lottie/chat2.json')}}" background="transparent" speed="1" class="w-50 h-75 mx-auto" loop autoplay></lottie-player>
        @endif




    </div>

    <!-- Footer (Send message form) -->
    <div wire:loading.remove wire:target="sendMessage">
        <div class="card-footer d-sm-flex w-100 border-0 pt-3 pb-3 px-4">
            <div class="position-relative w-100 me-2 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-lg" style="padding-right: 85px;" placeholder="Digite sua mensagem" wire:model="input" wire:keydown.enter="sendMessage">
            </div>
            <button type="button" class="btn btn-primary btn-icon btn-lg d-none d-sm-inline-flex ms-1" wire:click="sendMessage">
                <i class="bx bx-send"></i>
            </button>
            <button type="button" class="btn btn-primary btn-lg w-100 d-sm-none" wire:click="sendMessage">
                <i class="bx bx-send fs-xl me-2"></i>
                Enviar
            </button>
        </div>
    </div>

    <div wire:loading wire:target="sendMessage">
        <div class="card-footer d-sm-flex w-100 border-0 pt-3 pb-3 px-4">
            <div class="position-relative w-100 me-2 mb-3 mb-sm-0 placeholder-glow bg-accent">
                <input type="text" class="form-control form-control-lg placeholder " style="padding-right: 85px;" value="Carregando aguarde" readonly>
            </div>
            <button type="button" class="btn btn-secondary btn-icon btn-lg d-none d-sm-inline-flex ms-1" disabled>
                <i class="bx bx-send"></i>
            </button>
            <button type="button" class="btn btn-secondary btn-lg w-100 d-sm-none" disabled>
                <i class="bx bx-send fs-xl me-2"></i>
                Enviar
            </button>
        </div>
    </div>



    @else

    <!-- Messages -->
    <div class="card-body scrollbar-hover w-100 pb-0 overflow-auto" style="max-height: 100vh;">
        <lottie-player src="{{asset('lottie/chat.json')}}" background="transparent" speed="1" class="w-75 mx-auto" loop autoplay></lottie-player>
    </div>

    <!-- Footer (Send message form) -->
    <div class="card-footer d-sm-flex w-100 border-0 pt-3 pb-3 px-4">
        <div class="position-relative w-100 me-2 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-lg" style="padding-right: 85px;" placeholder="Digite sua mensagem" value="Selecione um Topico ou crie um para iniciar as conversar" readonly>
        </div>
    </div>

    @endif

    <script>
        window.livewire.on('scrollToBottom', () => {
            var objDiv = document.getElementById("mensagens");
            objDiv.scrollTop = objDiv.scrollHeight;
        });
    </script>

    <script>
        function deleteChat() {
            var header = document.getElementById("header");
            var headerTrash = document.getElementById("headerTrash");

            header.classList.add("d-none");
            headerTrash.classList.remove("d-none");
        }

        function cancelDelete() {
            var header = document.getElementById("header");
            var headerTrash = document.getElementById("headerTrash");

            header.classList.remove("d-none");
            headerTrash.classList.add("d-none");
        }
    </script>


</div>
