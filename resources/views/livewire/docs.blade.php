<div>
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
        <pre><code>git clone https://github.com/seu-usuario/seu-repositorio.git</code></pre>
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
</div>
