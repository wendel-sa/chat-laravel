<div class="offcanvas-lg offcanvas-start position-absolute position-lg-relative h-100 bg-secondary shadow-none border-end" data-bs-scroll="true" data-bs-backdrop="false" style="max-height: 100vh;">
    <div class="card-header w-100 border-0 p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0">Nova Apresentação</h1>
            <button type="button" class="btn btn-link nav-link bg-faded-primary-hover d-lg-none py-2 ps-2 pe-3 me-n3" data-bs-dismiss="offcanvas" data-bs-target="#contactsList">
                <i class="bx bx-x fs-xl me-1"></i>
                Close
            </button>
        </div>
        <div class="position-relative">
            <textarea class="form-control pe-5" placeholder="Descreva sua apresentção" wire:model="titulo" wire:keydown.enter="newApresentacao"></textarea>
            <i class="bx bx-search fs-xl text-nav position-absolute top-50 end-0 translate-middle-y me-3"></i>
        </div>
    </div>
    <div class="card-body  scrollbar-hover overflow-auto w-100 p-0" style="max-height: 100vh;">

        @if(count($Apresentacoes) > 0)
        @foreach($Apresentacoes as $apresentacao)

        @if($click == $apresentacao->id)
        <a href="#" class="position-relative d-flex align-items-start border-bottom text-decoration-none bg-light pe-none py-3 px-4">
            <div class="position-absolute top-0 start-0 bg-primary w-2 h-100"></div>
            <i class="bx bx-check-circle text-primary position-absolute top-0 start-0 mt-3 ms-3"></i>
            <div class="w-100 ps-2 ms-1">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <h6 class="mb-0 me-2">

                        {{ $apresentacao->titulo }}
                    </h6>
                    <span class="fs-xs text-muted">
                        {{ $apresentacao->created_at->diffForHumans() }}
                    </span>
                </div>
            </div>
        </a>
        @else
        <!-- Contact -->
        <a href="{{route('p.show', $apresentacao->id)}}" class="d-flex align-items-start border-bottom text-decoration-none bg-faded-primary-hover py-3 px-4">
            <div class="w-100 ps-2 ms-1">
                <div class="d-flex align-items-center justify-content-between mb-1">
                    <h6 class="mb-0 me-2">
                        {{ $apresentacao->titulo }}
                    </h6>
                    <span class="fs-xs text-muted">12:04</span>
                </div>
            </div>
        </a>
        @endif
        @endforeach
        @else
        <p class="h5 text-center pt-2">Nenhuma Apresentação</p>
        <lottie-player src="{{asset('lottie/topico1.json')}}" background="transparent" speed="1" class="w-50 h-75 mx-auto" loop autoplay></lottie-player>
        @endif


    </div>
</div>
