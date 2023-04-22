<div class="bg-dark">
    <!-- Toolbar example -->
    <div class="btn-toolbar" role="toolbar" aria-label="Settings toolbar">
        <div class="btn-group me-2" role="group" aria-label="Settings group">
            <button class="btn btn-secondary btn-icon" type="button">
                <i class="bx bx-font-family"></i>
            </button>
            <button class="btn btn-secondary btn-icon" type="button"><i class="bx bx-share-alt"></i></button>
            <button class="btn btn-secondary" wire:click="imagem()" type="button">Imagem <i class="bx bx-image"></i></button>

            <div class="btn-group" role="group">
                <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Dropdown
                </button>
                <div class="dropdown-menu my-1">
                    <a href="#" class="dropdown-item">Dropdown link</a>
                    <a href="#" class="dropdown-item">Dropdown link</a>
                    <a href="#" class="dropdown-item">Dropdown link</a>
                </div>
            </div>

            <button class="btn btn-success" type="button">
                <i class="bx bx-check fs-5 lh-1 me-2"></i>
                Apply
            </button>

            <!-- Offcanvas position: Left -->

            <!-- Toogle button -->
            <button class="btn btn-outline-secondary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft">
                <i class="bx bx-edit me-2"></i>
                Editar
            </button>
            @push('modals')
            <!-- Offcanvas -->
            <div class="offcanvas offcanvas-start bg-secondary" id="offcanvasLeft" tabindex="-1">
                <div class="offcanvas-header border-bottom">
                    <h5 class="offcanvas-title">Left offcanvas</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
                </div>
                <div class="offcanvas-body">
                    <p>Content for the offcanvas goes here. You can place just about any Bootstrap component or custom elements here.</p>
                </div>
            </div>
            @endpush




            <button class="btn btn-outline-danger btn-icon" type="button"><i class="bx bx-trash"></i></button>
        </div>
    </div>
</div>
