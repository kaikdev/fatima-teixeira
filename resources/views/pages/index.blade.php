@extends('layouts.layout')

{{-- SEO --}}
@section('title', 'Home')
@section('description-seo', !empty($metatag) ? $metatag->descricao : getItem('client'))

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="{{ asset('css/home.css') }}">
@endsection

@section('content')
    <section class="area-banner">
        <video width="320" height="240" autoplay muted loop>
            <source src="{{ asset('video/video-home.mp4') }}" type="video/mp4">
            Seu navegador não suporta a tag de vídeo.
        </video>

        <h1 class="title-banner fade-typing">
            A experiência e o conhecimento certos
            <br>
            podem mudar o rumo da sua trajetória.
        </h1>
    </section>

    <main class="home-diferenciais">
        <div class="content">
            <div class="left animate" data-animate="left">
                <img src="{{ asset('img/home/fatima-diferenciais.webp') }}" alt="Foto Fátima Teixeira" width="588" height="582">
            </div>

            <div class="right animate" data-animate="right">
                <div class="swiper my-swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <img src="{{ asset('img/home/Agrupar1.webp') }}" alt="Diferenciais 1" class="banner-image" width="357" height="318">
                        </div>

                        <div class="swiper-slide">
                            <img src="{{ asset('img/home/Agrupar2.webp') }}" alt="Diferenciais 2" class="banner-image" width="357" height="318">
                        </div>

                        <div class="swiper-slide">
                            <img src="{{ asset('img/home/Agrupar3.webp') }}" alt="Diferenciais 3" class="banner-image" width="357" height="318">
                        </div>
                    </div>

                    <div class="scrollbar-wrapper">
                        <div class="swiper-scrollbar"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section class="area-em-foco">
        <div class="content">
            <div class="left animate" data-animate="right">
                <h1>Em foco</h1>

                <h2>Acompanhe os destaques da Fátima Teixeira.</h2>

                <p>
                    Você vai encontrar artigos, eventos e reflexões sobre temas que fortalecem o desenvolvimento humano e
                    profissional.
                </p>
            </div>

            <div class="right animate" data-animate="top">
                <div class="box-em-foco">
                    <h3>
                        Novidade
                        <span>no meu instagram</span>
                    </h3>

                    <div class="area-img">
                        <a href="#" target="_blank">
                            <img src="{{ asset('img/home/novidade.webp') }}" alt="Imagem Novidade Instagram" width="305" height="355">
                        </a>
                    </div>

                    <div class="footer-em-foco">
                        <div class="left">
                            <img src="{{ asset('img/home/layout-insta-left.webp') }}" alt="layout novidade instagram" width="93" height="24">
                        </div>

                        <div class="right">
                            <img src="{{ asset('img/home/layout-insta-right.webp') }}" alt="layout novidade instagram" width="22" height="24">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('includes.lead', [
        'title' => 'Transforme conhecimento em resultados',
        'subtitle' => 'saiba como!'
    ])
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@12/swiper-bundle.min.js"></script>
    
    <script>
        const swiper = new Swiper(".my-swiper", {
            loop: false,
            autoplay: {
                delay: 4000,
            },
            speed: 1500,
            effect: "cube",
            grabCursor: true,
            cubeEffect: {
                shadow: true,
                slideShadows: true,
                shadowOffset: 20,
                shadowScale: 0.94,
            },
            scrollbar: {
                el: ".swiper-scrollbar",
                hide: false,
                draggable: true,
            },
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const el = document.querySelector(".fade-typing");

            const originalHTML = el.innerHTML;
            const parts = originalHTML.split(/<br\s*\/?>/i); // separa pelas quebras

            let delay = 0;
            let finalHTML = "";

            parts.forEach((line, lineIndex) => {
                // Remove espaços extras
                const text = line.trim();

                // Constrói spans para cada caractere
                text.split("").forEach((char) => {
                finalHTML += `<span class="fade-char" style="animation-delay:${delay}ms">${char}</span>`;
                delay += 50;
                });

                // Reinsere o <br> exatamente onde estava
                if (lineIndex < parts.length - 1) {
                finalHTML += "<br>";
                }
            });

            el.innerHTML = finalHTML;
        });
    </script>
@endsection