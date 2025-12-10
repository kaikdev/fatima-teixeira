<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title') • {{ getItem('client') }}</title>

    <!-- Favicons -->
    <link rel="icon" type="image/png" href="{{ asset('favicon/favicon-96x96.png') }}" sizes="96x96" />
    <link rel="icon" type="image/svg+xml" href="{{ asset('favicon/favicon.svg') }}" />
    <link rel="shortcut icon" href="{{ asset('favicon/favicon.ico') }}" />
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}" />

    <meta name="apple-mobile-web-app-title" content="{{ getItem('client') }}" />
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}" />

    <meta name="title" content="@yield('title') • {{ getItem('client') }}">
    <meta name="author" content="Engenho de imagens">
    <meta name="description" content="@yield('description-seo')">
    <meta name="keywords" content="@yield('keywords-seo')">

    <!-- META TAGS(OPEN GRAPH) -->
    <meta property="og:title" content="@yield('title') • {{ getItem('client') }}"/>
    <meta property="og:type" content="company"/>
    <meta property="og:description" content="@yield('description-seo')"/>
    <meta property="og:url" content="{{ url()->current() }}"/>
    <meta property="og:site_name" content="{{ getItem('client') }}"/>
    <meta name="twitter:card" content="summary">
    <meta name="twitter:description" content="@yield('description-seo')">
    <meta property="twitter:url" content="{{ url()->current() }}"/>
    <meta property="twitter:title" content="@yield('title') • {{ getItem('client') }}"/>

    <!-- Images Compartilhamento (Link) -->
    <meta property="og:image" content="{{ asset('img/quem-somos/otconsultoria.webp') }}"/>
    <meta property="twitter:image" content="{{ asset('img/quem-somos/otconsultoria.webp') }}"/>
    <link rel="canonical" href="{{ url()->current() }}" />

    @verbatim
    <script type="application/ld+json">{ "@context": "https://schema.org/", "@type": "WebSite", "name": "@yield('title') • {{ getItem('client') }}", "url": "{{ url()->current() }}", "potentialAction": { "@type": "SearchAction", "target": "{search_term_string}", "query-input": "required name=search_term_string" }}</script>
    <script type="application/ld+json">{ "@context": "https://schema.org", "@type": "Organization", "name": "{{ getItem('client') }}", "url": "{{ url()->current() }}", "logo": "{{ asset('img/logo-ot_consultoria.webp') }}", "contactPoint": { "@type": "ContactPoint", "telephone": "11995788113", "contactType": "customer service", "contactOption": "TollFree", "areaServed": "BR", "availableLanguage": "Portuguese" }, "sameAs": [ "{{ url()->current() }}" ]}</script>
    @endverbatim

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style-popup.css') }}">
    @stack('styles')
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
    @yield('head')

    {!! ToastMagic::styles() !!}
</head>
<body>

    @include('includes.header')

    @yield('content')

    @include('includes.footer')

    <div class="box-float">
        <ul>
            <li>
                <a href="{{ getItem('linkedin') }}" target="_blank">
                    <i class="icon-linkedin"></i>
                </a>
            </li>
            <li>
                <a href="{{ getItem('link-whats1') }}" target="_blank">
                    <i class="icon-whatsapp"></i>
                </a>
            </li>
            <li>
                <a href="{{ getItem('link-instagram1') }}" target="_blank">
                    <i class="icon-instagram"></i>
                </a>
            </li>
            <li>
                <a href="{{ getItem('link-facebook') }}">
                    <i class="icon-facebook"></i>
                </a>
            </li>
        </ul>
    </div>

    {{--
    <!--Popup Lgpd-->
    <div class="pop-up-cookie" id="popup">
        <div class="content-wrapper">
            <div class="icon">
                <svg width="24" height="24" xmlns="http://www.w3.org/2000/svg" fill-rule="evenodd" clip-rule="evenodd"><path d="M12.078 0c6.587.042 11.922 5.403 11.922 12 0 6.623-5.377 12-12 12s-12-5.377-12-12c3.887 1.087 7.388-2.393 6-6 4.003.707 6.786-2.722 6.078-6zm1.422 17c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm-6.837-3c1.104 0 2 .896 2 2s-.896 2-2 2-2-.896-2-2 .896-2 2-2zm11.337-3c1.104 0 2 .896 2 2s-.896 2-2 2-2-.896-2-2 .896-2 2-2zm-6-1c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm-9-3c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1zm13.5-2c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm-15-2c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm6-2c.828 0 1.5.672 1.5 1.5s-.672 1.5-1.5 1.5-1.5-.672-1.5-1.5.672-1.5 1.5-1.5zm-3.5-1c.552 0 1 .448 1 1s-.448 1-1 1-1-.448-1-1 .448-1 1-1z"/></svg>
            </div>
            <p>Utilizamos cookies para você obter a melhor experiência em nosso site. Ao continuar navegando, você concorda com a nossa <a href="{{ url('/termos') }}">Política de Privacidade</a>.</p>
            <div class="buttons">
                <a href="javascript:;" itemprop="url" class="btn-privacy" id="privacy-ok">Aceitar</a>
                <div class="close">✖</div>
            </div>
        </div>
    </div>
    --}}

    <!--Modal sair-->
    {{--
    <div id="modal-exit" class="all-modal">
        <div class="underlay"></div>
        <div class="modal">
            <i class="icon-close-popup">✖</i>
            <div class="wrapper">
                <div class="logo">
                    <img src="{{ asset('img/logo-vanessa-branco.webp')}}" alt="Logo - {{ getItem('client') }}" title="Logo - {{ getItem('client') }}">
                </div>
                <div class="modal-content">
                    <h2>Você encontrou o que precisava?</h2>
                    <p>Preencha os campos abaixo e fique por dentro das novidades!</p>
                    <form action="" id="popup-exit" method="post">
                        @csrf
                        <div class="col-2">
                            <input type="text" required placeholder="Nome" class="form-control" name="nome" id="nome">
                            <input type="text" required placeholder="Sobrenome" class="form-control" name="sobrenome" id="sobrenome">
                        </div>

                        <input type="email" required placeholder="E-mail" class="form-control" name="email">

                        <input class="input-whatsapp" type="text" required placeholder="WhatsApp" class="whatsappModalSair form-control" name="whatsapp" maxlength="15">

                        <input type="text" style="height:0;border:0;outline:0;margin:0;position:absolute;padding:0;min-height:unset;" name="codigo" placeholder="Código"  autocomplete = “off”  maxlength="80">

                        <div class="terms">
                            <input type="checkbox" required name="checkbox" id="termosPopup">
                            <label for="termosPopup">Concordo com os <a href="{{ route('termos') }}">termos de uso</a> e <a href="{{ route('termos') }}">privacidade</a> da {{ getItem('client') }}.</label>
                        </div>
                        <button>Enviar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    --}}

    <!-- ANIMAÇÕES -->
    <script>
        window.addEventListener("DOMContentLoaded", () => {
            const targets = document.querySelectorAll('.animate');

            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('active');
                        observer.unobserve(entry.target); // Evita reativar várias vezes
                    }
                });
            }, { threshold: 0.3 });

            targets.forEach(target => observer.observe(target));
        });
    </script>

    {{--
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/script-popup-saida.js') }}"></script>
    --}}

    <script src="{{ asset('js/scripts.js') }}"></script>

    {!! ToastMagic::scripts() !!}

    <!-- Btn mobile -->
    <script>
        let btnMobile = document.querySelectorAll('header .btnMobile')
        const header = document.querySelector('header')

        btnMobile.forEach(openMenu =>{
            openMenu.addEventListener('click', function(){
                header.classList.toggle('active')
            })
        })
    </script>

    @yield('scripts')
</body>
</html>
