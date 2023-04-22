<div>
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
            <div class="offcanvas-lg offcanvas-start position-absolute position-lg-relative h-100 bg-secondary shadow-none border-end" data-bs-scroll="true" data-bs-backdrop="false" style="max-height: 100vh;">
                <div class="card-header w-100 border-0 p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0">{{ $apresentacao->titulo }}</h1>
                        <button type="button" class="btn btn-link nav-link bg-faded-primary-hover d-lg-none py-2 ps-2 pe-3 me-n3" data-bs-dismiss="offcanvas" data-bs-target="#contactsList">
                            <i class="bx bx-x fs-xl me-1"></i>
                            Close
                        </button>
                    </div>
                    <div class="position-relative">
                        Voltar
                    </div>
                </div>
                <div class="container card-body  scrollbar-hover overflow-auto w-100 p-0" style="max-height: 100vh;">
                    {{ $etapa }}
                    @if(count($apresentacaoPaginas) > 0)
                    @foreach($apresentacaoPaginas as $pagina)

                    <div class="m-3 border border-1 border-light rounded-3">

                        <article class="container card border-0 bg-transparent">
                            <div class="position-relative overflow-hidden rounded-3">
                                @if( $pagina->imagem != null)
                                <img src="assets/img/blog/05.jpg" alt="Image">
                                @endif
                            </div>
                            <div class="card-body px-0">
                                <a href="#/pagina_{{ $pagina->id}}/2" class="badge fs-sm text-white bg-info shadow-info text-decoration-none mb-3">
                                    {{ $pagina->numero}} - {{ $pagina->titulo }} <i class="fas fa-arrow-right ms-1"></i>
                                </a>

                                @foreach($textos[$pagina->id] as $texto)
                                <p class="mb-4">
                                    {{ $texto->texto }}
                                </p>
                                @endforeach
                            </div>
                        </article>

                    </div>



                    @endforeach
                    @else
                    <p class="h5 text-center pt-2">Nenhuma Página</p>
                    <lottie-player src="{{asset('lottie/topico1.json')}}" background="transparent" speed="1" class="w-50 h-75 mx-auto" loop autoplay></lottie-player>
                    @endif


                </div>
            </div>
        </div>

        <!-- Chat window -->
        <div class="col-lg-10 mb-5 pb-5">

            @if($apresentacao->descricao != null)
            @livewire('apresentacao-gerar-imagem')
            @livewire('apresentacao-config')
            <div class="reveal">

                <!-- Any section element inside of this container is displayed as a slide -->
                <div class="slides">

                    <section data-background-transition="zoom">
                        <a href="https://revealjs.com">
                            <img src="https://static.slid.es/reveal/logo-v1/reveal-white-text.svg" alt="reveal.js logo" style="height: 180px; margin: 0 auto 4rem auto; background: transparent;" class="demo-logo">
                        </a>
                        <h3>
                            {{ $apresentacao->titulo }}
                        </h3>
                        <p>
                            <small>
                                Por: {{ $apresentacao->user->name }}
                            </small>
                        </p>
                    </section>

                    @foreach ($apresentacaoPaginas as $pagina)
                    <section data-auto-animate data-background-transition="slide" id="pagina_{{$pagina->id}}" data-background-color="#{{$pagina->cor}}">
                        @foreach ($apresentacaoPaginaTextos[$pagina->id] as $texto)
                        <p class="fragment fade-in-then-semi-out">{{$texto->texto}}</p>
                        @endforeach
                    </section>
                    @endforeach
                    <section>
                        <a href="https://revealjs.com">
                            <img src="https://static.slid.es/reveal/logo-v1/reveal-white-text.svg" alt="reveal.js logo" style="height: 180px; margin: 0 auto 4rem auto; background: transparent;" class="demo-logo">
                        </a>
                        <h3>The HTML Presentation Framework</h3>
                        <p>
                            <small>Created by <a href="http://hakim.se">Hakim El Hattab</a> and <a href="https://github.com/hakimel/reveal.js/graphs/contributors">contributors</a></small>
                        </p>
                    </section>

                    <section>
                        <h2>Hello There</h2>
                        <p>
                            reveal.js enables you to create beautiful interactive slide decks using HTML. This presentation will show you examples of what it can do.
                        </p>
                    </section>

                    <!-- Example of nested vertical slides -->
                    <section>
                        <section>
                            <h2>Vertical Slides</h2>
                            <p>Slides can be nested inside of each other.</p>
                            <p>Use the <em>Space</em> key to navigate through all slides.</p>
                            <br>
                            <a href="#/2/1" class="navigate-down">
                                <img class="r-frame" style="background: rgba(255,255,255,0.1);" width="178" height="238" data-src="https://static.slid.es/reveal/arrow.png" alt="Down arrow">
                            </a>
                        </section>
                        <section>
                            <h2>Basement Level 1</h2>
                            <p>Nested slides are useful for adding additional detail underneath a high level horizontal slide.</p>
                        </section>
                        <section>
                            <h2>Basement Level 2</h2>
                            <p>That's it, time to go back up.</p>
                            <br>
                            <a href="#/2">
                                <img class="r-frame" style="background: rgba(255,255,255,0.1); transform: rotate(180deg);" width="178" height="238" data-src="https://static.slid.es/reveal/arrow.png" alt="Up arrow">
                            </a>
                        </section>
                    </section>

                    <section>
                        <h2>Slides</h2>
                        <p>
                            Not a coder? Not a problem. There's a fully-featured visual editor for authoring these, try it out at <a href="https://slides.com" target="_blank">https://slides.com</a>.
                        </p>
                    </section>

                    <section data-visibility="hidden">
                        <h2>Hidden Slides</h2>
                        <p>
                            This slide is visible in the source, but hidden when the presentation is viewed. You can show all hidden slides by setting the `showHiddenSlides` config option to `true`.
                        </p>
                    </section>

                    <section>
                        <h2>Point of View</h2>
                        <p>
                            Press <strong>ESC</strong> to enter the slide overview.
                        </p>
                        <p>
                            Hold down the <strong>alt</strong> key (<strong>ctrl</strong> in Linux) and click on any element to zoom towards it using <a href="http://lab.hakim.se/zoom-js">zoom.js</a>. Click again to zoom back out.
                        </p>
                        <p>
                            (NOTE: Use ctrl + click in Linux.)
                        </p>
                    </section>

                    <section data-auto-animate data-auto-animate-easing="cubic-bezier(0.770, 0.000, 0.175, 1.000)">
                        <h2>Auto-Animate</h2>
                        <p>Automatically animate matching elements across slides with <a href="https://revealjs.com/auto-animate/">Auto-Animate</a>.</p>
                        <div class="r-hstack justify-center">
                            <div data-id="box1" style="background: #999; width: 50px; height: 50px; margin: 10px; border-radius: 5px;"></div>
                            <div data-id="box2" style="background: #999; width: 50px; height: 50px; margin: 10px; border-radius: 5px;"></div>
                            <div data-id="box3" style="background: #999; width: 50px; height: 50px; margin: 10px; border-radius: 5px;"></div>
                        </div>
                    </section>
                    <section data-auto-animate data-auto-animate-easing="cubic-bezier(0.770, 0.000, 0.175, 1.000)">
                        <div class="r-hstack justify-center">
                            <div data-id="box1" data-auto-animate-delay="0" style="background: cyan; width: 150px; height: 100px; margin: 10px;"></div>
                            <div data-id="box2" data-auto-animate-delay="0.1" style="background: magenta; width: 150px; height: 100px; margin: 10px;"></div>
                            <div data-id="box3" data-auto-animate-delay="0.2" style="background: yellow; width: 150px; height: 100px; margin: 10px;"></div>
                        </div>
                        <h2 style="margin-top: 20px;">Auto-Animate</h2>
                    </section>
                    <section data-auto-animate data-auto-animate-easing="cubic-bezier(0.770, 0.000, 0.175, 1.000)">
                        <div class="r-stack">
                            <div data-id="box1" style="background: cyan; width: 300px; height: 300px; border-radius: 200px;"></div>
                            <div data-id="box2" style="background: magenta; width: 200px; height: 200px; border-radius: 200px;"></div>
                            <div data-id="box3" style="background: yellow; width: 100px; height: 100px; border-radius: 200px;"></div>
                        </div>
                        <h2 style="margin-top: 20px;">Auto-Animate</h2>
                    </section>

                    <section>
                        <h2>Touch Optimized</h2>
                        <p>
                            Presentations look great on touch devices, like mobile phones and tablets. Simply swipe through your slides.
                        </p>
                    </section>



                    <section>
                        <p>Add the <code>r-fit-text</code> class to auto-size text</p>
                        <h2 class="r-fit-text">FIT TEXT</h2>
                    </section>

                    <section>
                        <section id="fragments">
                            <h2>Fragments</h2>
                            <p>Hit the next arrow...</p>
                            <p class="fragment">... to step through ...</p>
                            <p><span class="fragment">... a</span> <span class="fragment">fragmented</span> <span class="fragment">slide.</span></p>

                            <aside class="notes">
                                This slide has fragments which are also stepped through in the notes window.
                            </aside>
                        </section>
                        <section>
                            <h2>Fragment Styles</h2>
                            <p>There's different types of fragments, like:</p>
                            <p class="fragment grow">grow</p>
                            <p class="fragment shrink">shrink</p>
                            <p class="fragment fade-out">fade-out</p>
                            <p>
                                <span style="display: inline-block;" class="fragment fade-right">fade-right, </span>
                                <span style="display: inline-block;" class="fragment fade-up">up, </span>
                                <span style="display: inline-block;" class="fragment fade-down">down, </span>
                                <span style="display: inline-block;" class="fragment fade-left">left</span>
                            </p>
                            <p class="fragment fade-in-then-out">fade-in-then-out</p>
                            <p class="fragment fade-in-then-semi-out">fade-in-then-semi-out</p>
                            <p>Highlight <span class="fragment highlight-red">red</span> <span class="fragment highlight-blue">blue</span> <span class="fragment highlight-green">green</span></p>
                        </section>
                    </section>

                    <section id="transitions">
                        <h2>Transition Styles</h2>
                        <p>
                            You can select from different transitions, like: <br>
                            <a href="?transition=none#/transitions">None</a> -
                            <a href="?transition=fade#/transitions">Fade</a> -
                            <a href="?transition=slide#/transitions">Slide</a> -
                            <a href="?transition=convex#/transitions">Convex</a> -
                            <a href="?transition=concave#/transitions">Concave</a> -
                            <a href="?transition=zoom#/transitions">Zoom</a>
                        </p>
                    </section>

                    <section id="themes">
                        <h2>Themes</h2>
                        <p>
                            reveal.js comes with a few themes built in: <br>
                            <!-- Hacks to swap themes after the page has loaded. Not flexible and only intended for the reveal.js demo deck. -->
                            <a href="#" onclick="document.getElementById('theme').setAttribute('href','dist/theme/black.css'); return false;">Black (default)</a> -
                            <a href="#" onclick="document.getElementById('theme').setAttribute('href','dist/theme/white.css'); return false;">White</a> -
                            <a href="#" onclick="document.getElementById('theme').setAttribute('href','dist/theme/league.css'); return false;">League</a> -
                            <a href="#" onclick="document.getElementById('theme').setAttribute('href','dist/theme/sky.css'); return false;">Sky</a> -
                            <a href="#" onclick="document.getElementById('theme').setAttribute('href','dist/theme/beige.css'); return false;">Beige</a> -
                            <a href="#" onclick="document.getElementById('theme').setAttribute('href','dist/theme/simple.css'); return false;">Simple</a> <br>
                            <a href="#" onclick="document.getElementById('theme').setAttribute('href','dist/theme/serif.css'); return false;">Serif</a> -
                            <a href="#" onclick="document.getElementById('theme').setAttribute('href','dist/theme/blood.css'); return false;">Blood</a> -
                            <a href="#" onclick="document.getElementById('theme').setAttribute('href','dist/theme/night.css'); return false;">Night</a> -
                            <a href="#" onclick="document.getElementById('theme').setAttribute('href','dist/theme/moon.css'); return false;">Moon</a> -
                            <a href="#" onclick="document.getElementById('theme').setAttribute('href','dist/theme/solarized.css'); return false;">Solarized</a>
                        </p>
                    </section>

                    <section>
                        <section data-background="#dddddd">
                            <h2>Slide Backgrounds</h2>
                            <p>
                                Set <code>data-background="#dddddd"</code> on a slide to change the background color. All CSS color formats are supported.
                            </p>
                            <a href="#" class="navigate-down">
                                <img class="r-frame" style="background: rgba(255,255,255,0.1);" width="178" height="238" data-src="https://static.slid.es/reveal/arrow.png" alt="Down arrow">
                            </a>
                        </section>

                        <section data-background="https://static.slid.es/reveal/image-placeholder.png">
                            <h2>Image Backgrounds</h2>
                            <pre><code class="hljs html">&lt;section data-background="image.png"&gt;</code></pre>
                        </section>
                        <section data-background="https://static.slid.es/reveal/image-placeholder.png" data-background-repeat="repeat" data-background-size="100px">
                            <h2>Tiled Backgrounds</h2>
                            <pre><code class="hljs html" style="word-wrap: break-word;">&lt;section data-background="image.png" data-background-repeat="repeat" data-background-size="100px"&gt;</code></pre>
                        </section>
                        <section data-background-video="https://static.slid.es/site/homepage/v1/homepage-video-editor.mp4" data-background-color="#000000">
                            <div style="background-color: rgba(0, 0, 0, 0.9); color: #fff; padding: 20px;">
                                <h2>Video Backgrounds</h2>
                                <pre><code class="hljs html" style="word-wrap: break-word;">&lt;section data-background-video="video.mp4,video.webm"&gt;</code></pre>
                            </div>
                        </section>
                        <section data-background="http://i.giphy.com/90F8aUepslB84.gif">
                            <h2>... and GIFs!</h2>
                        </section>
                    </section>

                    <section data-transition="slide" data-background="#4d7e65" data-background-transition="zoom">
                        <h2>Background Transitions</h2>
                        <p>
                            Different background transitions are available via the backgroundTransition option. This one's called "zoom".
                        </p>
                        <pre><code class="hljs javascript">Reveal.configure({ backgroundTransition: 'zoom' })</code></pre>
                    </section>

                    <section data-transition="slide" data-background="#b5533c" data-background-transition="zoom">
                        <h2>Background Transitions</h2>
                        <p>
                            You can override background transitions per-slide.
                        </p>
                        <pre><code class="hljs html" style="word-wrap: break-word;">&lt;section data-background-transition="zoom"&gt;</code></pre>
                    </section>

                    <section data-background-iframe="https://hakim.se" data-background-interactive>
                        <div style="position: absolute; width: 40%; right: 0; box-shadow: 0 1px 4px rgba(0,0,0,0.5), 0 5px 25px rgba(0,0,0,0.2); background-color: rgba(0, 0, 0, 0.9); color: #fff; padding: 20px; font-size: 20px; text-align: left;">
                            <h2>Iframe Backgrounds</h2>
                            <p>Since reveal.js runs on the web, you can easily embed other web content. Try interacting with the page in the background.</p>
                        </div>
                    </section>

                    <section>
                        <h2>Marvelous List</h2>
                        <ul>
                            <li>No order here</li>
                            <li>Or here</li>
                            <li>Or here</li>
                            <li>Or here</li>
                        </ul>
                    </section>

                    <section>
                        <h2>Fantastic Ordered List</h2>
                        <ol>
                            <li>One is smaller than...</li>
                            <li>Two is smaller than...</li>
                            <li>Three!</li>
                        </ol>
                    </section>

                    <section>
                        <h2>Tabular Tables</h2>
                        <table>
                            <thead>
                                <tr>
                                    <th>Item</th>
                                    <th>Value</th>
                                    <th>Quantity</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Apples</td>
                                    <td>$1</td>
                                    <td>7</td>
                                </tr>
                                <tr>
                                    <td>Lemonade</td>
                                    <td>$2</td>
                                    <td>18</td>
                                </tr>
                                <tr>
                                    <td>Bread</td>
                                    <td>$3</td>
                                    <td>2</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>

                    <section>
                        <h2>Clever Quotes</h2>
                        <p>
                            These guys come in two forms, inline: <q cite="http://searchservervirtualization.techtarget.com/definition/Our-Favorite-Technology-Quotations">The nice thing about standards is that there are so many to choose from</q> and block:
                        </p>
                        <blockquote cite="http://searchservervirtualization.techtarget.com/definition/Our-Favorite-Technology-Quotations">
                            &ldquo;For years there has been a theory that millions of monkeys typing at random on millions of typewriters would
                            reproduce the entire works of Shakespeare. The Internet has proven this theory to be untrue.&rdquo;
                        </blockquote>
                    </section>

                    <section>
                        <h2>Intergalactic Interconnections</h2>
                        <p>
                            You can link between slides internally,
                            <a href="#/2/3">like this</a>.
                        </p>
                    </section>

                    <section>
                        <h2>Speaker View</h2>
                        <p>There's a <a href="https://revealjs.com/speaker-view/">speaker view</a>. It includes a timer, preview of the upcoming slide as well as your speaker notes.</p>
                        <p>Press the <em>S</em> key to try it out.</p>

                        <aside class="notes">
                            Oh hey, these are some notes. They'll be hidden in your presentation, but you can see them if you open the speaker notes window (hit 's' on your keyboard).
                        </aside>
                    </section>

                    <section>
                        <h2>Export to PDF</h2>
                        <p>Presentations can be <a href="https://revealjs.com/pdf-export/">exported to PDF</a>, here's an example:</p>
                        <iframe data-src="https://www.slideshare.net/slideshow/embed_code/42840540" width="445" height="355" frameborder="0" marginwidth="0" marginheight="0" scrolling="no" style="border:3px solid #666; margin-bottom:5px; max-width: 100%;" allowfullscreen> </iframe>
                    </section>

                    <section>
                        <h2>Global State</h2>
                        <p>
                            Set <code>data-state="something"</code> on a slide and <code>"something"</code>
                            will be added as a class to the document element when the slide is open. This lets you
                            apply broader style changes, like switching the page background.
                        </p>
                    </section>

                    <section data-state="customevent">
                        <h2>State Events</h2>
                        <p>
                            Additionally custom events can be triggered on a per slide basis by binding to the <code>data-state</code> name.
                        </p>
                        <pre><code class="javascript" data-trim contenteditable style="font-size: 18px;"> Reveal.on( 'customevent', function() { console.log( '"customevent" has fired' ); } ); </code></pre>
                    </section>

                    <section>
                        <h2>Take a Moment</h2>
                        <p>
                            Press B or . on your keyboard to pause the presentation. This is helpful when you're on stage and want to take distracting slides off the screen.
                        </p>
                    </section>

                    <section>
                        <h2>Much more</h2>
                        <ul>
                            <li>Right-to-left support</li>
                            <li><a href="https://revealjs.com/api/">Extensive JavaScript API</a></li>
                            <li><a href="https://revealjs.com/auto-slide/">Auto-progression</a></li>
                            <li><a href="https://revealjs.com/backgrounds/#parallax-background">Parallax backgrounds</a></li>
                            <li><a href="https://revealjs.com/keyboard/">Custom keyboard bindings</a></li>
                        </ul>
                    </section>

                    <section style="text-align: left;">
                        <h1>THE END</h1>
                        <p>
                            - <a href="https://slides.com">Try the online editor</a> <br>
                            - <a href="https://github.com/hakimel/reveal.js">Source code &amp; documentation</a>
                        </p>
                    </section>

                </div>

            </div>
            @else
            <div class="container py-5">

                <div>
                    <div class="fs-sm mb-2">Primary - {{ $etapa }}%</div>
                    <div class="progress mb-3" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width:  {{ $etapa }}%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <div class="mt-5 p-5" wire:loading.remove>
                    <h2 class="text-center display-1">Vamos gerar uma apresentação com o Laravel</h2>

                    <p class="text-center display-5">Clique no botão abaixo para gerar uma apresentação</p>
                    <div class="text-center">
                        <button class="btn btn-primary btn-lg" wire:click="gerarApresentação()">
                            <i class="bi bi-file-earmark-easel"></i>
                            Gerar Apresentação
                        </button>

                    </div>
                </div>
                <div>
                    <div class="fs-sm mb-2">Primary - {{ $etapa }}%</div>
                    <div class="progress mb-3" style="height: 4px;">
                        <div class="progress-bar" role="progressbar" style="width:  {{ $etapa }}%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                    </div>
                </div>

                <!-- Horizontal steps -->
                <!-- Convert steps to horizontal layout on certain breakpoint by adding steps-horizontal-sm, steps-horizontal-md, steps-horizontal-lg, steps-horizontal-xl, steps-horizontal-xxl -->
                <div class="steps steps-horizontal-md">

                    <!-- Step -->
                    <div class="step">
                        <div class="step-number">
                            <div class="step-number-inner {{ $etapa >= 25 ? 'bg-primary' : '' }}">1</div>
                        </div>
                        <div class="step-body">
                            <h5 class="mb-2">Choose your course</h5>
                            <p class="fs-sm mb-0">Nulla faucibus mauris pellentesque blandit faucibus non. Sit ut et at suspendisse gravida hendrerit tempus placerat ac nunc dapibus.</p>
                        </div>
                    </div>

                    <!-- Step -->
                    <div class="step">
                        <div class="step-number">
                            <div class="step-number-inner {{ $etapa >= 50 ? 'bg-primary' : '' }}">2</div>
                        </div>
                        <div class="step-body">
                            <h5 class="mb-2">Learn by doing</h5>
                            <p class="fs-sm mb-0">Tristique sed pharetra feugiat tempor sagittis. Ultricies eu bibendum adipiscing lacinia. Quisque praesent aliquam tempus phasellus ut integer.</p>
                        </div>
                    </div>

                    <!-- Step -->
                    <div class="step">
                        <div class="step-number">
                            <div class="step-number-inner {{ $etapa >= 75 ? 'bg-primary' : '' }}">3</div>
                        </div>
                        <div class="step-body">
                            <h5 class="mb-2">Get instant expert feedback</h5>
                            <p class="fs-sm mb-0">Duis euismod enim, facilisis risus tellus pharetra lectus diam neque. Nec ultrices mi faucibus est. Magna ullamcorper potenti elementum.</p>
                        </div>
                    </div>

                    <!-- Step -->
                    <div class="step">
                        <div class="step-number">
                            <div class="step-number-inner {{ $etapa >= 100 ? 'bg-primary' : '' }}">4</div>
                        </div>
                        <div class="step-body">
                            <h5 class="mb-2">Get instant expert feedback</h5>
                            <p class="fs-sm mb-0">Duis euismod enim, facilisis risus tellus pharetra lectus diam neque. Nec ultrices mi faucibus est. Magna ullamcorper potenti elementum.</p>
                        </div>
                    </div>
                </div>
            </div>

            @endif
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

    <script>
        //fique obeservando o emit percentual e seu valor e altera o valor da barra de progresso
        window.livewire.on('percentual', (percentual) => {
            alert(percentual);
            document.querySelector('.progress-bar').style.width = percentual + '%';
        });
    </script>
</div>