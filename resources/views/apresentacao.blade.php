<x-app-layout>

    @push('styles')
    <link rel="stylesheet" href="{{asset('assets/apresentacao/dist/theme/solarized.css')}}" id="theme">
    <link rel="stylesheet" href="{{asset('assets/apresentacao/dist/reset.css')}}">
    <link rel="stylesheet" href="{{asset('assets/apresentacao/dist/reveal.css')}}">

    <!-- Theme used for syntax highlighting of code -->
    <link rel="stylesheet" href="{{asset('assets/apresentacao/plugin/highlight/monokai.css')}}" id="highlight-theme">

    @endpush

    <div class="row vh-100">
        <!-- Contacts list -->
        <div class="col-lg-2">
            @livewire('apresentacao-user')
        </div>

        <!-- Chat window -->
        <div class="col-lg-10 mb-5 pb-5">
            @livewire('apresentacao-gerar-imagem')
            @livewire('apresentacao-config')
            @livewire('apresentacao-user-pagina')
        </div>

    </div>

    @push('scripts')

    <script src="{{asset('assets/apresentacao/dist/reveal.js')}}"></script>
    <script src="{{asset('assets/apresentacao/plugin/zoom/zoom.js')}}"></script>
    <script src="{{asset('assets/apresentacao/plugin/notes/notes.js')}}"></script>
    <script src="{{asset('assets/apresentacao/plugin/search/search.js')}}"></script>
    <script src="{{asset('assets/apresentacao/plugin/markdown/markdown.js')}}"></script>
    <script src="{{asset('assets/apresentacao/plugin/highlight/highlight.js')}}"></script>
    <script>
        // Also available as an ES module, see:
        // https://revealjs.com/initialization/
        Reveal.initialize({
            controls: true,
            progress: true,
            center: true,
            hash: true,

            // Learn about plugins: https://revealjs.com/plugins/
            plugins: [RevealZoom, RevealNotes, RevealSearch, RevealMarkdown, RevealHighlight]
        });

        //se for emitido o emit presentacao, destroi o reveal e cria um novo
        window.livewire.on('presentacao', () => {
            Reveal.destroy();
            Reveal.initialize({
                controls: true,
                progress: true,
                center: true,
                hash: true,

                // Learn about plugins: https://revealjs.com/plugins/
                plugins: [RevealZoom, RevealNotes, RevealSearch, RevealMarkdown, RevealHighlight]
            });
        });
    </script>
    @endpush
</x-app-layout>
