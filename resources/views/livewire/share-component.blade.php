<div>
    <section class="container">
        <div class="bg-secondary rounded-3 py-5 px-3 px-sm-4 px-lg-0">
            <div class="align-items-center pt-1 pb-2 py-lg-4">
                <div class="mb-4 pb-3 mb-md-0 pb-md-0">
                    <figure class="card h-100 position-relative border-0 shadow-sm pt-4 m-4">
                        <span class="btn btn-icon btn-primary shadow-primary pe-none position-absolute top-0 start-0 translate-middle-y ms-4">
                            <i class="bi bi-cloud-fill"></i>
                        </span>
                        <blockquote class="card-body mb-0">
                            <div class="mb-0 overflow-auto" style="white-space: pre-wrap; font-family: 'figtree', sans-serif; max-height: 50vh;">
                                {{$conversa->content}}
                            </div>
                        </blockquote>
                        <div class="p-5">

                            <!-- Audio tag with the link to the audio file -->
                            <audio id="audioVoz" src="{{asset('audio/google/' . basename($audio))}}" type="audio/mp3"></audio>


                            <div class="d-flex align-items-center">
                                <button class="me-2 btn btn-warning btn-icon rounded-circle" id="btnPlay2" wire:ignore>
                                    <i class="bx bx-play"></i>
                                </button>

                                <span id="currentTime" class="ap-current-time flex-shr fw-medium mx-3 mx-lg-4" wire:ignore>0:00</span>

                                <div class="w-100">
                                    <div class="progress" style="height: 4px;">
                                        <div id="rangerTime2" class="progress-bar" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                                <span id="durationTimer" class="mx-3"></span>

                                <a href="{{asset('audio/google/' . basename($audio))}}" download="audio-sample" class="btn btn-icon btn-secondary ms-2">
                                    <i class="bx bx-download"></i>
                                </a>
                            </div>
                        </div>
                    </figure>
                </div>
            </div>
    </section>

    <script>
        //pegue o id audioVoz e coloque no consolo quando ele estiver em olay e em pause

        let audio = document.getElementById('audioVoz');
        let divAudio = document.getElementById('divAudio');
        let btnPlay2 = document.getElementById('btnPlay2');
        let estado = false;

        //fique obeservamdo o botao btnPlay2 se ele for clicado execute a funcao audioPlay
        btnPlay2.addEventListener('click', audioPlay);

        //faça a função audioPlay
        function audioPlay() {
            if (estado == false) {
                audio.play();
                estado = true;
            } else {
                audio.pause();
                estado = false;
            }
        }

        //fique observando o audio
        audio.addEventListener('timeupdate', function() {
            let currentTime = document.getElementById('currentTime');
            let rangerTime2 = document.getElementById('rangerTime2');
            let durationTimer = document.getElementById('durationTimer');

            let duration = audio.duration;
            let time = audio.currentTime;

            let s = parseInt(time % 60);
            let m = parseInt((time / 60) % 60);
            let s_d = parseInt(duration % 60);
            let m_d = parseInt((duration / 60) % 60);

            if (s < 10) {
                s = '0' + s;
            }
            if (m < 10) {
                m = '0' + m;
            }
            if (s_d < 10) {
                s_d = '0' + s_d;
            }
            if (m_d < 10) {
                m_d = '0' + m_d;
            }

            currentTime.textContent = m + ':' + s;
            rangerTime2.style.width = (time / duration) * 100 + '%';
            durationTimer.textContent = m_d + ':' + s_d;

            //se o audio estiver em play adicione as classes active shadow-warning ao botao btnPlay2
            if (!audio.paused) {
                btnPlay2.classList.add('active', 'shadow-warning');
                btnPlay2.innerHTML = '<i class="bx bx-pause"></i>';
            } else {
                btnPlay2.classList.remove('active', 'shadow-warning');
                btnPlay2.innerHTML = '<i class="bx bx-play"></i>';
            }
        });
    </script>
</div>
