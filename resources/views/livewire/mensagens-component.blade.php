<div class="card h-100 border-0 bg-transparent pb-5">
    @if($select)
    <!-- Header -->

    <div class="navbar card-header d-flex align-items-center justify-content-between w-100 p-sm-4 p-3 row">
        <div class="d-flex align-items-center pe-3 col-4">
            <button type="button" class="navbar-toggler d-lg-none me-3" data-bs-toggle="offcanvas" data-bs-target="#contactsList" aria-controls="contactsList" aria-label="Toggle contacts list">
                <span class="navbar-toggler-icon"></span>
            </button>
            <i class="bi bi-chat rounded-circle" width="40" alt="Albert Flores"></i>
            <h6 class="mb-0 px-1 mx-2">{{$titulo}}</h6>
            <div>
                {{$numMensagens}} - Mensagens
            </div>

        </div>
        <div class="col-8">
            <div class="row justify-content-end">
                <div class="col-10">
                    @if($voz == 'google')
                    @livewire('google-voice-component')
                    @elseif($voz == 'aws')
                    @livewire('aws-voice-component')
                    @else($voz == 'sistema')
                    @livewire('text-voice-component')
                    @endif
                </div>
                <div class="col-2">
                    @livewire('config-component')
                </div>

            </div>
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

            <!-- Testimonial: Style 1 -->
            <figure class="card h-100 position-relative border-0 shadow-sm pt-4 mt-4" style="max-width: 50vw;">
                <span class="btn btn-icon btn-primary shadow-primary pe-none position-absolute top-0 start-0 translate-middle-y ms-4">
                    <i class="bi bi-cloud-fill"></i>
                </span>
                <blockquote class="card-body mb-0">
                    <div class="mb-0" style="white-space: pre-wrap; font-family: 'figtree', sans-serif;" id="assitent-message->{{ $message->id }}" onclick="textFormated('assitent-message->{{ $message->id }}')">
                        {{ $message['content'] }}
                    </div>
                </blockquote>
                <figcaption class="card-footer border-0 d-flex align-items-center pt-0">
                    <button wire:click="textAudio('{{$message->id}}')" class="btn btn-icon btn-outline-primary me-2">
                        <i class="bi bi-volume-up-fill"></i>
                    </button>
                    <button class="btn btn-icon btn-outline-primary me-2" onclick="copyToClipboard('assitent-message->{{ $message->id }}')">
                        <i class="bi bi-clipboard"></i>
                    </button>
                    <button wire:click="qrcode('{{$message->id}}')" class="btn btn-icon btn-outline-primary me-2">
                        <i class="bi bi-share"></i>
                    </button>
                    <div class="ps-3">
                        <span class="fs-sm text-muted"> {{date('H:i', strtotime($message['created_at']))}}</span>
                    </div>
                </figcaption>
            </figure>
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
                <input id="transcript" type="text" class="form-control form-control-lg" style="padding-right: 85px;" placeholder="Digite sua mensagem" wire:model="input" wire:keydown.enter="sendMessage" wire:ignore>
            </div>
            <button type="button" class="btn btn-primary btn-icon btn-lg d-none d-sm-inline-flex ms-1" wire:click="sendMessage">
                <i class="bx bx-send"></i>
            </button>
            <button id="startButton" class="btn btn-outline-secondary btn-icon btn-lg d-none d-sm-inline-flex ms-1">
                <i class="bi bi-mic"></i>
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

    @livewire('voice-text-component')

    @livewire('qr-code-component')

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

        function playAudio(id) {
            //pegue o texto da tag <pre com o id informado
            var text = document.getElementById(id).innerText;
            var msg = new SpeechSynthesisUtterance();
            msg.text = text; // Configura a mensagem a ser sintetizada
            msg.lang = "pt-BR"; // Configura a linguagem da mensagem para Português do Brasil
            window.speechSynthesis.speak(msg); // Sintetiza a mensagem
        }
    </script>

    <script>
        //faça uma função para formatar o texto textFormated(com o id da tag <pre>)
        function textFormated(id) {
            //pegue o texto da tag <pre com o id informado
            var text = document.getElementById(id).innerText;
            //onde tiver \n substitua por <br> e ''' substitua por <code> e com o fim ``` substitua por </code>
            var textFormated = text.replace(/\n/g, "<br>");
            //é possivel analizar o textp e verificar se tem ```html e ``` e substituir por <code> e </code>
            if (textFormated.includes("```")) {
                //quebre o texto em 3 partes
                //1º parte: texto antes do ```html
                //2º parte: texto entre ```html e ```
                //3º parte: texto depois do ```
                //substitua o texto entre ```html e ``` por <pre class = 'line-numbers'><code class = 'lang-html'>
                /*dentro do <pre class = 'line-numbers'> adicione esta tag <pre class = 'line-numbers'> substitua - `<` → `&lt;` - `>` → `&gt;` - `&` → `&amp;` - `"` → `&quot;` - `'` → `&#39;` - `/` → `&#x2F;` - ` ` → `&nbsp;` - `\t` → `&nbsp;&nbsp;&nbsp;&nbsp;` - `\n` → `<br>`*/

                var parte1 = textFormated.split("```")[0];
                var parte2 = textFormated.split("```")[1].split("```")[0];
                var parte3 = textFormated.split("```")[1].split("```")[1];
                //substitua o texto entre ```html e ``` por <pre class = 'line-numbers'><code class = 'lang-html'>
                //dentro do <pre class = 'line-numbers'> adicione esta tag <pre class = 'line-numbers'>
                parte2 = parte2.replace(/</g, "&lt;");
                parte2 = parte2.replace(/>/g, "&gt;");
                parte2 = parte2.replace(/&/g, "&amp;");
                parte2 = parte2.replace(/"/g, "&quot;");
                parte2 = parte2.replace(/'/g, "&#39;");
                parte2 = parte2.replace(/\//g, "&#x2F;");
                parte2 = parte2.replace(/ /g, "&nbsp;");
                parte2 = parte2.replace(/\t/g, "&nbsp;&nbsp;&nbsp;&nbsp;");
                parte2 = parte2.replace(/\n/g, "<br>");
                textFormated = parte1 + "<pre class='line-numbers' style='white-space: pre-wrap; font-family: 'figtree', sans-serif;''><code class='lang-html'>" + parte2 + "</code></pre>" + parte3;
                alert(textFormated);
            }
            //retorne o texto formatado
            reescreve(textFormated, id);
        }

        //faça uma função para formatar o texto textFormated(com o id da tag <pre>)
        function reescreve(textoFormatado, id) {
            //pegue o id
            var id = document.getElementById(id);
            //substitua o texto da tag <pre com o id informado pelo texto formatado
            id.innerHTML = textoFormatado;
        }
    </script>

    <script>
        function copyToClipboard(div) {
            let texto = document.getElementById(div).innerText;
            navigator.clipboard.writeText(texto);
            //envia um emit de copia sucesso
            window.livewire.emit('copied');
        }
    </script>

</div>
