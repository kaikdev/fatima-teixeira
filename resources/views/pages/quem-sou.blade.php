@extends('layouts.layout')

{{-- SEO --}}
@section('title', 'Quem sou')
@section('description-seo', !empty($metatag) ? $metatag->descricao : getItem('client'))

@section('head')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
    <link rel="stylesheet" href="{{ asset('css/quem-sou.css') }}">
@endsection

@section('content')
    @include('includes.breadcrumb', [
        'page' => 'Quem sou'    
    ])

    <main class="quem-sou">
        <div class="content">
            <div class="left">
                <div class="item-text animate" data-animate="right">
                    <p>
                        Sou Fátima Teixeira, mentora e educadora com mais de 20 anos de experiência no desenvolvimento humano e profissional. Minha trajetória no mercado financeiro e na condução de projetos educacionais consolidou meu nome como referência em credibilidade, ética e transformação, por isso, minha marca carrega minha própria assinatura.
                    </p>
                </div>
                
                <div class="item-text animate" data-animate="left">
                    <p>
                        Atuo com mentoria, consultoria educacional, capacitações e palestras que unem técnica, sensibilidade humana e propósito. Meu foco é apoiar profissionais e líderes que buscam evolução, clareza e resultados sustentáveis, equilibrando competências técnicas e comportamentais. 
                    </p>
                </div>
                
                <div class="item-text animate" data-animate="bottom">
                    <p>
                        Meu diferencial está na capacidade de traduzir conteúdos complexos em aprendizados práticos, humanos e inspiradores. Quero ser lembrada como alguém que orienta, eleva e contribui para que cada pessoa alcance seus objetivos com consciência, estratégia e crescimento real.
                    </p>
                </div>
            </div>

            <div class="right">
                <div class="area-img animate" data-animate="right">
                    <img src="{{ asset('img/quem-sou/fatima.webp') }}" alt="Fátima Teixeira" width="330" height="auto">
                </div>
            </div>
        </div>
    </main>
    
    <section class="mini-curriculo">
        <div class="content">
            <h1 class="title animate" data-animate="left">
                Mini currículo
            </h1>

            <p class="animate" data-animate="left">
                • Economista, Mestre em Psicologia da Educação (PUC-SP) 
            </p>

            <p class="animate" data-animate="left">
                • Mais de 25 anos de experiência em educação, finanças e desenvolvimento de competências
            </p>

            <p class="animate" data-animate="left">
                • Liderança de projetos e equipes em instituições de prestígio
            </p>

            <p class="animate" data-animate="left">
                • Atuação destacada na Planejar (CFP Brasil): certificação CFP, parcerias e trilhas formativas
            </p>

            <p class="animate" data-animate="left">
                • Mentora de profissionais em transição, liderança e alinhamento de propósito
            </p>

            <p class="animate" data-animate="left">
                • Consultora em projetos educacionais estratégicos: escolas corporativas, formações e avaliação de competências
            </p>
        </div>
    </section>

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
        'subtitle' => 'consultoria',
        'route' => 'consultoria'
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