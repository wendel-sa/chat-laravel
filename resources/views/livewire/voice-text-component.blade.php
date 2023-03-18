<div>
    <script>
        // Verifica se o navegador suporta a API Web Speech
        if (!('webkitSpeechRecognition' in window)) {
            alert("Seu navegador não suporta reconhecimento de fala.");
        } else {
            // Cria uma instância da API Web Speech
            var recognition = new webkitSpeechRecognition();

            // Define a língua a ser reconhecida
            recognition.lang = 'pt-BR';

            // Define o número máximo de alternativas a serem retornadas
            recognition.maxAlternatives = 1;

            // Define se o reconhecimento deve continuar após a fala do usuário
            recognition.continuous = false;

            // Define o evento para quando o reconhecimento começar
            recognition.onstart = function() {
                console.log("Iniciou o reconhecimento de fala.");
                document.getElementById("startButton").classList.add("active");
            };

            // Define o evento para quando o reconhecimento parar
            recognition.onend = function() {
                console.log("Parou o reconhecimento de fala.");
                document.getElementById("startButton").classList.remove("active");
            };

            // Define o evento para quando o reconhecimento retornar um resultado
            recognition.onresult = function(event) {
                // Obtém a transcrição de texto do primeiro resultado
                var transcript = event.results[0][0].transcript;

                // Exibe a transcrição na tela
                //document.getElementById("transcript").value = transcript;

                //envia um emit com o valor do transcript
                livewire.emit('transcript', transcript);
            };

            // Define o evento para quando o botão for clicado
            document.getElementById("startButton").addEventListener("click", function() {
                // Inicia o reconhecimento de fala
                recognition.start();
            });
        }
    </script>
</div>
