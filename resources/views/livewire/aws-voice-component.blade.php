<div>

    <div wire:loading>
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <div wire:loading.remove>
        <div class="">

            <div class="audio-player card-body p-2 p-sm-4">

                <!-- Audio tag with the link to the audio file -->
                <audio src="{{asset('audio/aws/' . basename($audio))}}" type="audio/mp3" preload="auto" autoplay></audio>

                <!-- Custom player markup -->
                <button type="button" class="ap-play-button btn btn-icon btn-primary shadow-primary"></button>
                <span class="ap-current-time flex-shr fw-medium mx-3 mx-lg-4">0:00</span>
                <input type="range" class="ap-seek-slider" max="100" value="0">
                <span class="ap-duration flex-shr fw-medium mx-3 mx-lg-4">0:00</span>
                <div class="dropup">
                    <button type="button" class="ap-volume-button btn btn-icon btn-secondary" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-volume-full"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-dark my-1">
                        <input type="range" class="ap-volume-slider" max="100" value="100">
                    </div>
                </div>
                <a href="{{asset('audio/aws/' . basename($audio))}}" download="audio-sample" class="btn btn-icon btn-secondary ms-2">
                    <i class="bx bx-download"></i>
                </a>
            </div>

        </div>
    </div>
</div>
