<div>


    <script>
        function textToSpeech() {


            // Recebe o texto a ser falado através do emit
            window.livewire.on('vozModelo', (vozModelo) => {
                // Verifica se o emit vozModelo for igual a sistema inicia a fala
                if (vozModelo == 'sistema') {
                    // Cria uma nova instância do objeto SpeechSynthesisUtterance
                    const utterance = new SpeechSynthesisUtterance();

                    // Define o texto a ser falado
                    utterance.text = "Este é o modelo de voz do sistema.";

                    // Define a língua e a voz a ser usada
                    utterance.lang = "pt-BR";
                    utterance.voice = speechSynthesis.getVoices().find(voice => voice.lang === utterance.lang);
                    speechSynthesis.speak(utterance);
                }
            });

        }
    </script>


</div>
