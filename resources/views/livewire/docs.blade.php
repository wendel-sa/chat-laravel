<div class="overflow-auto" style="height: 100vh">
    <h1 class="h3 mb-0 text-gray-800">Documentação</h1>
    <h3>Créditos</h3>
    <p>Este projeto foi desenvolvido por <a href="https://github.com/wendel-sa" target="_blank">Wendel Amorim</a> e está disponível no GitHub sob a licença MIT.</p>
    <p class="mb-4">Aqui você encontra a documentação do projeto.</p>
    <p> Este projeto foi desenvolvido utilizando o framework Laravel e o tema do Bootstrap Silicon. </p>
    <p> O projeto foi desenvolvido para fins de estudo e não deve ser utilizado em produção. </p>
    <h2>Instalação e Configuração</h2>
    <h3>Pré-requisitos</h3>
    <p>Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:</p>
    <ul class="list-group list-disc">
        <li>Git</li>
        <li>PHP 8</li>
        <li>Composer</li>
        <li>Node.js</li>
        <li>NPM</li>
        <li>MySQL</li>
    </ul>
    <h3>Instalação</h3>
    <p>Para instalar a aplicação em seu ambiente de desenvolvimento, siga os passos abaixo:</p>
    <p>Para mias informações sobre a API OpenAI ChatGPT, acesse o link abaixo:</p>
    <a href="https://platform.openai.com/docs/guides/chat" target="_blank">https://platform.openai.com/docs/guides/chat</a>
    <ol class="list-group list-decimal">
        <li>
            Faça o download ou clone o repositório do projeto em seu computador:
        </li>
        <pre><code>git clone https://github.com/wendel-sa/chat-laravel.git</code></pre>
        <li>Acesse a pasta do projeto e execute o comando abaixo para instalar as dependências:</li>
        <pre><code>composer install</code></pre>
        <li>Renomeie o arquivo .env.example para .env e configure as credenciais de acesso à API OpenAI ChatGPT.</li>
        <p>Para isso, crie uma conta no site da OpenAI e gere uma chave de aplicação. Em seguida, adicione a chave de aplicação no arquivo .env da aplicação.</p>
        <a href="https://platform.openai.com/account/api-keys" target="_blank">https://platform.openai.com/account/api-keys</a>
        <pre><code>OPENAI_API_KEY=sua-chave-secreta-da-api</code></pre>
        <li>Execute o comando abaixo para gerar uma chave de aplicação do laravel:</li>
        <pre><code>php artisan key:generate</code></pre>
        <li>Configure o banco de dados no arquivo .env da aplicação.</li>
        <p>Para isso, crie um banco de dados e adicione as credenciais de acesso ao banco de dados no arquivo .env da aplicação.</p>
        <li>Execute o comando abaixo para instalar o npm:</li>
        <pre><code>npm install</code></pre>
        <li>Execute o comando abaixo para compilar os assets:</li>
        <pre><code>npm run build</code></pre>
        <li>Execute o comando abaixo para executar as migrações do banco de dados:</li>
        <pre><code>php artisan migrate</code></pre>
        <li>Execute o comando abaixo para iniciar o servidor de desenvolvimento:</li>
        <pre><code>php artisan serve</code></pre>
        <li>Acesse a página http://localhost:8000 em seu navegador e comece a conversar com a API OpenAI ChatGPT.</li>
    </ol>

    <h2>Utilização</h2>
    <p>Para utilizar a aplicação, siga os passos abaixo:</p>
    <ol class="list-decimal">
        <li>Acesse a página http://localhost:8000/register para criar uma conta de usuário.</li>
        <li>Acesse a página http://localhost:8000/login para fazer login com a conta criada.</li>
        <li>Acesse a página http://localhost:8000/chat para acessar a interface de chat.</li>
    </ol>
    <p>Ao acessar a aplicação, você será redirecionado(a) para a página de chat. Nela, você poderá enviar suas perguntas e receber respostas geradas pela API OpenAI ChatGPT.</p>
    <p>A aplicação utiliza a biblioteca Livewire para criar interações dinâmicas na interface de chat, como a exibição de mensagens em tempo real e o envio de mensagens sem a necessidade de recarregar a página.</p>
    <p>Além disso, a aplicação é desenvolvida utilizando o framework Bootstrap e o sistema de classes do Tailwind CSS para criar uma interface moderna e responsiva.</p>

    <h2>Estrutura do Projeto</h2>
    <p>A estrutura do projeto segue a organização padrão do framework Laravel, com algumas pastas adicionais:</p>
    <ul>
        <li>app/Http/Livewire: contém os componentes Livewire utilizados na interface de chat.</li>
        <li>public/assets: contém o código JavaScript da aplicação, utilizado para interagir com os componentes Livewire e a API OpenAI ChatGPT.</li>
        <li>resources/views: contém os arquivos de visualização da aplicação, em formato Blade.</li>
        <li>routes/web.php: contém as rotas da aplicação.</li>
    </ul>

    <h2>Funcionalidades Implementadas</h2>
    <p>A aplicação ChatGPT em Laravel possui as seguintes funcionalidades implementadas:</p>
    <ul>
        <li>Integração com a API OpenAI ChatGPT: a aplicação utiliza a API OpenAI para gerar respostas para as perguntas enviadas pelos usuários.</li>
        <li>Interatividade em tempo real: a interface de chat utiliza a biblioteca Livewire para criar interações dinâmicas, como a exibição de mensagens em tempo real e o envio de mensagens sem a necessidade de recarregar a página.</li>
        <li>Interface responsiva: a aplicação utiliza o framework Bootstrap para criar uma interface moderna e responsiva.</li>
    </ul>
    Para informações adicionais, é importante mencionar que o tema utilizado na aplicação é o Silicon Business & Technology Template UI Kit, disponível no seguinte link: https://themes.getbootstrap.com/product/silicon-business-technology-template-ui-kit/. A licença deste tema foi adquirida e está sendo utilizada legalmente no desenvolvimento da aplicação.

    <h2>Funcionalidades Futuras</h2>

    <p>Algumas funcionalidades que podem ser implementadas no futuro:</p>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check2" viewBox="0 0 16 16">
            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button" aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark" aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto" aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>


    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="bootstrap" viewBox="0 0 118 94">
            <title>Bootstrap</title>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M24.509 0c-6.733 0-11.715 5.893-11.492 12.284.214 6.14-.064 14.092-2.066 20.577C8.943 39.365 5.547 43.485 0 44.014v5.972c5.547.529 8.943 4.649 10.951 11.153 2.002 6.485 2.28 14.437 2.066 20.577C12.794 88.106 17.776 94 24.51 94H93.5c6.733 0 11.714-5.893 11.491-12.284-.214-6.14.064-14.092 2.066-20.577 2.009-6.504 5.396-10.624 10.943-11.153v-5.972c-5.547-.529-8.934-4.649-10.943-11.153-2.002-6.484-2.28-14.437-2.066-20.577C105.214 5.894 100.233 0 93.5 0H24.508zM80 57.863C80 66.663 73.436 72 62.543 72H44a2 2 0 01-2-2V24a2 2 0 012-2h18.437c9.083 0 15.044 4.92 15.044 12.474 0 5.302-4.01 10.049-9.119 10.88v.277C75.317 46.394 80 51.21 80 57.863zM60.521 28.34H49.948v14.934h8.905c6.884 0 10.68-2.772 10.68-7.727 0-4.643-3.264-7.207-9.012-7.207zM49.948 49.2v16.458H60.91c7.167 0 10.964-2.876 10.964-8.281 0-5.406-3.903-8.178-11.425-8.178H49.948z"></path>
        </symbol>
        <symbol id="home" viewBox="0 0 16 16">
            <path d="M8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4.5a.5.5 0 0 0 .5-.5v-4h2v4a.5.5 0 0 0 .5.5H14a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146zM2.5 14V7.707l5.5-5.5 5.5 5.5V14H10v-4a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v4H2.5z" />
        </symbol>
        <symbol id="speedometer2" viewBox="0 0 16 16">
            <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z" />
            <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z" />
        </symbol>
        <symbol id="table" viewBox="0 0 16 16">
            <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm15 2h-4v3h4V4zm0 4h-4v3h4V8zm0 4h-4v3h3a1 1 0 0 0 1-1v-2zm-5 3v-3H6v3h4zm-5 0v-3H1v2a1 1 0 0 0 1 1h3zm-4-4h4V8H1v3zm0-4h4V4H1v3zm5-3v3h4V4H6zm4 4H6v3h4V8z" />
        </symbol>
        <symbol id="people-circle" viewBox="0 0 16 16">
            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
            <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
        </symbol>
        <symbol id="grid" viewBox="0 0 16 16">
            <path d="M1 2.5A1.5 1.5 0 0 1 2.5 1h3A1.5 1.5 0 0 1 7 2.5v3A1.5 1.5 0 0 1 5.5 7h-3A1.5 1.5 0 0 1 1 5.5v-3zM2.5 2a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 1h3A1.5 1.5 0 0 1 15 2.5v3A1.5 1.5 0 0 1 13.5 7h-3A1.5 1.5 0 0 1 9 5.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zM1 10.5A1.5 1.5 0 0 1 2.5 9h3A1.5 1.5 0 0 1 7 10.5v3A1.5 1.5 0 0 1 5.5 15h-3A1.5 1.5 0 0 1 1 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3zm6.5.5A1.5 1.5 0 0 1 10.5 9h3a1.5 1.5 0 0 1 1.5 1.5v3a1.5 1.5 0 0 1-1.5 1.5h-3A1.5 1.5 0 0 1 9 13.5v-3zm1.5-.5a.5.5 0 0 0-.5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 0-.5-.5h-3z" />
        </symbol>
    </svg>

    <main class="d-flex flex-nowrap">
        <h1 class="visually-hidden">Sidebars examples</h1>

        <div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Sidebar</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#table" />
                        </svg>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#grid" />
                        </svg>
                        Products
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link text-white">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#people-circle" />
                        </svg>
                        Customers
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>

        <div class="b-example-divider b-example-vr"></div>

        <div class="d-flex flex-column flex-shrink-0 p-3 bg-body-tertiary" style="width: 280px;">
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
                <svg class="bi pe-none me-2" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-4">Sidebar</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="#" class="nav-link active" aria-current="page">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#home" />
                        </svg>
                        Home
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#speedometer2" />
                        </svg>
                        Dashboard
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#table" />
                        </svg>
                        Orders
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#grid" />
                        </svg>
                        Products
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link link-body-emphasis">
                        <svg class="bi pe-none me-2" width="16" height="16">
                            <use xlink:href="#people-circle" />
                        </svg>
                        Customers
                    </a>
                </li>
            </ul>
            <hr>
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                    <strong>mdo</strong>
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>

        <div class="b-example-divider b-example-vr"></div>

        <div class="d-flex flex-column flex-shrink-0 bg-body-tertiary" style="width: 4.5rem;">
            <a href="/" class="d-block p-3 link-body-emphasis text-decoration-none" title="Icon-only" data-bs-toggle="tooltip" data-bs-placement="right">
                <svg class="bi pe-none" width="40" height="32">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="visually-hidden">Icon-only</span>
            </a>
            <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                <li class="nav-item">
                    <a href="#" class="nav-link active py-3 border-bottom rounded-0" aria-current="page" title="Home" data-bs-toggle="tooltip" data-bs-placement="right">
                        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Home">
                            <use xlink:href="#home" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom rounded-0" title="Dashboard" data-bs-toggle="tooltip" data-bs-placement="right">
                        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Dashboard">
                            <use xlink:href="#speedometer2" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom rounded-0" title="Orders" data-bs-toggle="tooltip" data-bs-placement="right">
                        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Orders">
                            <use xlink:href="#table" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom rounded-0" title="Products" data-bs-toggle="tooltip" data-bs-placement="right">
                        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Products">
                            <use xlink:href="#grid" />
                        </svg>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom rounded-0" title="Customers" data-bs-toggle="tooltip" data-bs-placement="right">
                        <svg class="bi pe-none" width="24" height="24" role="img" aria-label="Customers">
                            <use xlink:href="#people-circle" />
                        </svg>
                    </a>
                </li>
            </ul>
            <div class="dropdown border-top">
                <a href="#" class="d-flex align-items-center justify-content-center p-3 link-body-emphasis text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://github.com/mdo.png" alt="mdo" width="24" height="24" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small shadow">
                    <li><a class="dropdown-item" href="#">New project...</a></li>
                    <li><a class="dropdown-item" href="#">Settings</a></li>
                    <li><a class="dropdown-item" href="#">Profile</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="#">Sign out</a></li>
                </ul>
            </div>
        </div>

        <div class="b-example-divider b-example-vr"></div>

        <div class="flex-shrink-0 p-3" style="width: 280px;">
            <a href="/" class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom">
                <svg class="bi pe-none me-2" width="30" height="24">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-5 fw-semibold">Collapsible</span>
            </a>
            <ul class="list-unstyled ps-0">
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="true">
                        Home
                    </button>
                    <div class="collapse show" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Updates</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Reports</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        Dashboard
                    </button>
                    <div class="collapse" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Overview</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Weekly</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Monthly</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Annually</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                        Orders
                    </button>
                    <div class="collapse" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">New</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Processed</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Shipped</a></li>
                            <li><a href="#" class="link-body-emphasis d-inline-flex text-decoration-none rounded">Returned</a></li>
                        </ul>
                    </div>
                </li>
                <li class="border-top my-3"></li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed" data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                        Account
                    </button>
                    <div class="collapse" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">New...</a></li>
                            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Profile</a></li>
                            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Settings</a></li>
                            <li><a href="#" class="link-dark d-inline-flex text-decoration-none rounded">Sign out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>

        <div class="b-example-divider b-example-vr"></div>

        <div class="d-flex flex-column align-items-stretch flex-shrink-0 bg-body-tertiary" style="width: 380px;">
            <a href="/" class="d-flex align-items-center flex-shrink-0 p-3 link-body-emphasis text-decoration-none border-bottom">
                <svg class="bi pe-none me-2" width="30" height="24">
                    <use xlink:href="#bootstrap" />
                </svg>
                <span class="fs-5 fw-semibold">List group</span>
            </a>
            <div class="list-group list-group-flush border-bottom scrollarea">
                <a href="#" class="list-group-item list-group-item-action active py-3 lh-sm" aria-current="true">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">List group item heading</strong>
                        <small>Wed</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">List group item heading</strong>
                        <small class="text-body-secondary">Tues</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">List group item heading</strong>
                        <small class="text-body-secondary">Mon</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>

                <a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">List group item heading</strong>
                        <small class="text-body-secondary">Wed</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">List group item heading</strong>
                        <small class="text-body-secondary">Tues</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">List group item heading</strong>
                        <small class="text-body-secondary">Mon</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">List group item heading</strong>
                        <small class="text-body-secondary">Wed</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">List group item heading</strong>
                        <small class="text-body-secondary">Tues</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">List group item heading</strong>
                        <small class="text-body-secondary">Mon</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-sm" aria-current="true">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">List group item heading</strong>
                        <small class="text-body-secondary">Wed</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">List group item heading</strong>
                        <small class="text-body-secondary">Tues</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
                <a href="#" class="list-group-item list-group-item-action py-3 lh-sm">
                    <div class="d-flex w-100 align-items-center justify-content-between">
                        <strong class="mb-1">List group item heading</strong>
                        <small class="text-body-secondary">Mon</small>
                    </div>
                    <div class="col-10 mb-1 small">Some placeholder content in a paragraph below the heading and date.</div>
                </a>
            </div>
        </div>

    </main>
</div>