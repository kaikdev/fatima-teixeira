@extends('layouts.layout')

{{-- SEO --}}
@section('title', 'Consultoria')
@section('description-seo', !empty($metatag) ? $metatag->descricao : getItem('client'))

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
    <link rel="stylesheet" href="{{ asset('css/consultoria.css') }}">
@endsection

@section('content')
    @include('includes.breadcrumb', [
        'page' => 'Consultoria'    
    ])

    <main class="consultoria">
        <div class="content">
            <div class="area-text">
                <h1 class="title animate" data-animate="top">
                    Consultoria
                </h1>

                <p class="animate" data-animate="right">
                    Minha consultoria educacional nasce do propósito de transformar conhecimento em estratégia. Começo com um diagnóstico atento, no qual identifico competências, lacunas e necessidades reais. A partir disso, desenho trilhas de aprendizagem personalizadas que podem se tornar cursos, workshops, formações ou certificações. Também auxílio educadores e gestores na implementação de metodologias inovadoras e práticas mais humanas. Com minha experiência em projetos e certificações, crio soluções que geram impacto real. Mais do que cursos, desenvolvo experiências que fortalecem profissionais, instituições e tornam a educação um processo vivo de transformação.
                </p>
            </div>
            
            <div class="area-list">
                <div class="item animate" data-animate="top">
                    <p>
                        Mapeio necessidades e identifico quais competências devem ser desenvolvidas.
                    </p>
                    
                    <div class="area-icon">
                        <div class="top">
                            <div class="circle"></div>

                            <div class="icon">
                                <img src="{{ asset('img/consultoria/icon-mapa.webp') }}" alt="Imagem Mapa" width="50">
                            </div>
                        </div>

                        <div class="circle-bottom"></div>
                    </div>
                </div>

                <div class="item animate" data-animate="top">
                    <p>
                        Desenho trilhas de aprendizagem que conectam conteúdo, prática e aplicabilidade.
                    </p>
                    
                    <div class="area-icon">
                        <div class="top">
                            <div class="circle"></div>

                            <div class="icon">
                                <img src="{{ asset('img/consultoria/icon-curso.webp') }}" alt="Imagem Curso" width="50">
                            </div>
                        </div>

                        <div class="circle-bottom"></div>
                    </div>
                </div>

                <div class="item animate" data-animate="top">
                    <p>
                        Estruturo cursos e certificações que valorizam a experiência do aluno e agregam credibilidade ao mercado.
                    </p>
                    
                    <div class="area-icon">
                        <div class="top">
                            <div class="circle"></div>

                            <div class="icon">
                                <img src="{{ asset('img/consultoria/icon-lampada.webp') }}" alt="Imagem Lampada" width="50">
                            </div>
                        </div>

                        <div class="circle-bottom"></div>
                    </div>
                </div>

                <div class="item animate" data-animate="top">
                    <p>
                        Apoio gestores e educadores na implementação de metodologias inovadoras e efetivas.
                    </p>
                    
                    <div class="area-icon">
                        <div class="top">
                            <div class="circle"></div>

                            <div class="icon">
                                <img src="{{ asset('img/consultoria/icon-pessoas.webp') }}" alt="Imagem Pessoas" width="50">
                            </div>
                        </div>

                        <div class="circle-bottom"></div>
                    </div>
                </div>

                <div class="faixa">
                </div>
            </div>
        </div>
    </main>

    <section class="mini-carrossel">
        <div class="content">
            <div class="swiper galeria animate" data-animate="top">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="item-img">
                            <a href="{{ asset('img/lead/background-home.webp') }}" data-fancybox="galeria">
                                <img src="{{ asset('img/lead/background-home.webp') }}" alt="Imagem Carrossel" width="100" height="auto">
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="item-img">
                            <a href="{{ asset('img/lead/background-home.webp') }}" data-fancybox="galeria">
                                <img src="{{ asset('img/lead/background-home.webp') }}" alt="Imagem Carrossel" width="100" height="auto">
                            </a>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="item-img">
                            <a href="{{ asset('img/lead/background-home.webp') }}" data-fancybox="galeria">
                                <img src="{{ asset('img/lead/background-home.webp') }}" alt="Imagem Carrossel" width="100" height="auto">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </section>
    
    @include('includes.saiba-mais', [
        'title' => 'Saiba mais sobre a minha',
        'subtitle' => 'mentoria',
        'route' => 'mentoria'
    ])

    @include('includes.lead', [
        'title' => 'Transforme conhecimento em resultados',
        'subtitle' => 'saiba como!'
    ])
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

    <script>
        const swiper_galeria = new Swiper(".swiper.galeria", {
            speed: 600,
            autoplay: {
                delay: 6000,
            },
            rewind: true,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
            breakpoints: {
                320: {
                    slidesPerView: 1,
                    spaceBetween: 10
                },
                768: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                1050: {
                    slidesPerView: 3,
                    spaceBetween: 20
                }
            },
        });

        Fancybox.bind('[data-fancybox="galeria"]', {});
    </script>
@endsection