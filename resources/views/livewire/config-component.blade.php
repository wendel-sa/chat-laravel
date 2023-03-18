<div>
    <div class="dropdown me-sm-2">
        <button type="button" class="btn btn-outline-primary px-2 px-sm-3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="bx bx-dots-horizontal-rounded fs-xl mx-1 mx-sm-0 me-xl-2"></i>
            <span class="d-none d-xl-inline">Voz</span>
        </button>
        <div class="dropdown-menu dropdown-menu-end m-1">
            <h6 class="dropdown-header">Selecione o sistema de voz desejado</h6>
            <hr class="dropdown-divider">
            <button class="dropdown-item btn btn-secondary btn-google me-2 mb-2  {{$voz == 'google' ? 'active' : ''}}" wire:click="voz('google')">
                <i class="bx bxl-google me-2"></i>
                Google
            </button>

            <button class="dropdown-item btn btn-secondary btn-facebook me-2 mb-2 {{$voz == 'aws' ? 'active' : ''}}" wire:click="voz('aws')">
                <i class="bx bxl-amazon me-2"></i>
                AWS
            </button>
            <button class="dropdown-item btn btn-secondary btn-trip-advisor me-2 mb-2 {{$voz == 'sistema' ? 'active' : ''}}" wire:click="voz('sistema')">
                <i class="bx bx-devices me-2"></i>
                Sistema Integrado
            </button>
            <hr class="dropdown-divider">
            <button class="dropdown-item btn text-warning me-2 mb-2 ">
                <i class="bi bi-database-fill-x me-2"></i>
                Limpar mensagens
            </button>
            <button class="dropdown-item btn text-danger me-2 mb-2 ">
                <i class="bx bx-trash me-2"></i>
                Excluir mensagens
            </button>


        </div>
    </div>

</div>
