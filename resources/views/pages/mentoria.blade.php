@extends('layouts.layout')

{{-- SEO --}}
@section('title', 'Mentoria')
@section('description-seo', !empty($metatag) ? $metatag->descricao : getItem('client'))

@section('head')
    <style>
        .modal {
            --bs-modal-zindex: 1055;
            --bs-modal-width: 500px;
            --bs-modal-padding: 1rem;
            --bs-modal-margin: 0.5rem;
            --bs-modal-color: var(--bs-body-color);
            --bs-modal-bg: var(--bs-body-bg);
            --bs-modal-border-color: var(--bs-border-color-translucent);
            --bs-modal-border-width: var(--bs-border-width);
            --bs-modal-border-radius: var(--bs-border-radius-lg);
            --bs-modal-box-shadow: var(--bs-box-shadow-sm);
            --bs-modal-inner-border-radius: calc(var(--bs-border-radius-lg) - (var(--bs-border-width)));
            --bs-modal-header-padding-x: 1rem;
            --bs-modal-header-padding-y: 1rem;
            --bs-modal-header-padding: 1rem 1rem;
            --bs-modal-header-border-color: var(--bs-border-color);
            --bs-modal-header-border-width: var(--bs-border-width);
            --bs-modal-title-line-height: 1.5;
            --bs-modal-footer-gap: 0.5rem;
            --bs-modal-footer-bg: ;
            --bs-modal-footer-border-color: var(--bs-border-color);
            --bs-modal-footer-border-width: var(--bs-border-width);
            position: fixed;
            top: 0;
            left: 0;
            z-index: var(--bs-modal-zindex);
            display: none;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
            outline: 0;
        }

        .modal-dialog {
            position: relative;
            width: auto;
            margin: var(--bs-modal-margin);
            pointer-events: none;
        }

        .modal.fade .modal-dialog {
            transform: translate(0, -50px);
            transition: transform 0.3s ease-out;
        }

        @media (prefers-reduced-motion: reduce) {
            .modal.fade .modal-dialog {
                transition: none;
            }
        }

        .modal.show .modal-dialog {
            transform: none;
        }

        .modal.modal-static .modal-dialog {
            transform: scale(1.02);
        }

        .modal-dialog-scrollable {
            height: calc(100% - var(--bs-modal-margin) * 2);
        }

        .modal-dialog-scrollable .modal-content {
            max-height: 100%;
            overflow: hidden;
        }

        .modal-dialog-scrollable .modal-body {
            overflow-y: auto;
        }

        .modal-dialog-centered {
            display: flex;
            align-items: center;
            min-height: calc(100% - var(--bs-modal-margin) * 2);
        }

        .modal-content {
            position: relative;
            display: flex;
            flex-direction: column;
            width: 100%;
            color: var(--bs-modal-color);
            pointer-events: auto;
            background-color: var(--bs-modal-bg);
            background-clip: padding-box;
            border: var(--bs-modal-border-width) solid var(--bs-modal-border-color);
            border-radius: var(--bs-modal-border-radius);
            outline: 0;
        }

        .modal-backdrop {
            --bs-backdrop-zindex: 1050;
            --bs-backdrop-bg: #000;
            --bs-backdrop-opacity: 0.5;
            position: fixed;
            top: 0;
            left: 0;
            z-index: var(--bs-backdrop-zindex);
            width: 100vw;
            height: 100vh;
            background-color: var(--bs-backdrop-bg);
        }

        .modal-backdrop.fade {
            opacity: 0;
        }

        .modal-backdrop.show {
            opacity: var(--bs-backdrop-opacity);
        }

        .modal-header {
            display: flex;
            flex-shrink: 0;
            align-items: center;
            padding: var(--bs-modal-header-padding);
            border-bottom: var(--bs-modal-header-border-width) solid var(--bs-modal-header-border-color);
            border-top-left-radius: var(--bs-modal-inner-border-radius);
            border-top-right-radius: var(--bs-modal-inner-border-radius);
        }

        .modal-header .btn-close {
            padding: calc(var(--bs-modal-header-padding-y) * 0.5) calc(var(--bs-modal-header-padding-x) * 0.5);
            margin-top: calc(-0.5 * var(--bs-modal-header-padding-y));
            margin-right: calc(-0.5 * var(--bs-modal-header-padding-x));
            margin-bottom: calc(-0.5 * var(--bs-modal-header-padding-y));
            margin-left: auto;
        }

        .modal-title {
            margin-bottom: 0;
            line-height: var(--bs-modal-title-line-height);
        }

        .modal-body {
            position: relative;
            flex: 1 1 auto;
            padding: var(--bs-modal-padding);
        }

        .modal-footer {
            display: flex;
            flex-shrink: 0;
            flex-wrap: wrap;
            align-items: center;
            justify-content: flex-end;
            padding: calc(var(--bs-modal-padding) - var(--bs-modal-footer-gap) * 0.5);
            background-color: var(--bs-modal-footer-bg);
            border-top: var(--bs-modal-footer-border-width) solid var(--bs-modal-footer-border-color);
            border-bottom-right-radius: var(--bs-modal-inner-border-radius);
            border-bottom-left-radius: var(--bs-modal-inner-border-radius);
        }

        .modal-footer>* {
            margin: calc(var(--bs-modal-footer-gap) * 0.5);
        }

        @media (min-width: 576px) {
            .modal {
                --bs-modal-margin: 1.75rem;
                --bs-modal-box-shadow: var(--bs-box-shadow);
            }

            .modal-dialog {
                max-width: var(--bs-modal-width);
                margin-right: auto;
                margin-left: auto;
            }

            .modal-sm {
                --bs-modal-width: 300px;
            }
        }

        @media (min-width: 992px) {

            .modal-lg,
            .modal-xl {
                --bs-modal-width: 800px;
            }
        }

        @media (min-width: 1200px) {
            .modal-xl {
                --bs-modal-width: 1140px;
            }
        }

        .modal-fullscreen {
            width: 100vw;
            max-width: none;
            height: 100%;
            margin: 0;
        }

        .modal-fullscreen .modal-content {
            height: 100%;
            border: 0;
            border-radius: 0;
        }

        .modal-fullscreen .modal-header,
        .modal-fullscreen .modal-footer {
            border-radius: 0;
        }

        .modal-fullscreen .modal-body {
            overflow-y: auto;
        }

        @media (max-width: 575.98px) {
            .modal-fullscreen-sm-down {
                width: 100vw;
                max-width: none;
                height: 100%;
                margin: 0;
            }

            .modal-fullscreen-sm-down .modal-content {
                height: 100%;
                border: 0;
                border-radius: 0;
            }

            .modal-fullscreen-sm-down .modal-header,
            .modal-fullscreen-sm-down .modal-footer {
                border-radius: 0;
            }

            .modal-fullscreen-sm-down .modal-body {
                overflow-y: auto;
            }
        }

        @media (max-width: 767.98px) {
            .modal-fullscreen-md-down {
                width: 100vw;
                max-width: none;
                height: 100%;
                margin: 0;
            }

            .modal-fullscreen-md-down .modal-content {
                height: 100%;
                border: 0;
                border-radius: 0;
            }

            .modal-fullscreen-md-down .modal-header,
            .modal-fullscreen-md-down .modal-footer {
                border-radius: 0;
            }

            .modal-fullscreen-md-down .modal-body {
                overflow-y: auto;
            }
        }

        @media (max-width: 991.98px) {
            .modal-fullscreen-lg-down {
                width: 100vw;
                max-width: none;
                height: 100%;
                margin: 0;
            }

            .modal-fullscreen-lg-down .modal-content {
                height: 100%;
                border: 0;
                border-radius: 0;
            }

            .modal-fullscreen-lg-down .modal-header,
            .modal-fullscreen-lg-down .modal-footer {
                border-radius: 0;
            }

            .modal-fullscreen-lg-down .modal-body {
                overflow-y: auto;
            }
        }

        @media (max-width: 1199.98px) {
            .modal-fullscreen-xl-down {
                width: 100vw;
                max-width: none;
                height: 100%;
                margin: 0;
            }

            .modal-fullscreen-xl-down .modal-content {
                height: 100%;
                border: 0;
                border-radius: 0;
            }

            .modal-fullscreen-xl-down .modal-header,
            .modal-fullscreen-xl-down .modal-footer {
                border-radius: 0;
            }

            .modal-fullscreen-xl-down .modal-body {
                overflow-y: auto;
            }
        }

        @media (max-width: 1399.98px) {
            .modal-fullscreen-xxl-down {
                width: 100vw;
                max-width: none;
                height: 100%;
                margin: 0;
            }

            .modal-fullscreen-xxl-down .modal-content {
                height: 100%;
                border: 0;
                border-radius: 0;
            }

            .modal-fullscreen-xxl-down .modal-header,
            .modal-fullscreen-xxl-down .modal-footer {
                border-radius: 0;
            }

            .modal-fullscreen-xxl-down .modal-body {
                overflow-y: auto;
            }
        }

        .btn-close {
            --bs-btn-close-color: #000;
            --bs-btn-close-bg: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23000'%3e%3cpath d='M.293.293a1 1 0 0 1 1.414 0L8 6.586 14.293.293a1 1 0 1 1 1.414 1.414L9.414 8l6.293 6.293a1 1 0 0 1-1.414 1.414L8 9.414l-6.293 6.293a1 1 0 0 1-1.414-1.414L6.586 8 .293 1.707a1 1 0 0 1 0-1.414'/%3e%3c/svg%3e");
            --bs-btn-close-opacity: 0.5;
            --bs-btn-close-hover-opacity: 0.75;
            --bs-btn-close-focus-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            --bs-btn-close-focus-opacity: 1;
            --bs-btn-close-disabled-opacity: 0.25;
            box-sizing: content-box;
            width: 1em;
            height: 1em;
            padding: 0.25em 0.25em;
            color: var(--bs-btn-close-color);
            background: transparent var(--bs-btn-close-bg) center/1em auto no-repeat;
            filter: var(--bs-btn-close-filter);
            border: 0;
            border-radius: 0.375rem;
            opacity: var(--bs-btn-close-opacity);
        }

        .btn-close:hover {
            color: var(--bs-btn-close-color);
            text-decoration: none;
            opacity: var(--bs-btn-close-hover-opacity);
        }

        .btn-close:focus {
            outline: 0;
            box-shadow: var(--bs-btn-close-focus-shadow);
            opacity: var(--bs-btn-close-focus-opacity);
        }

        .btn-close:disabled,
        .btn-close.disabled {
            pointer-events: none;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
            opacity: var(--bs-btn-close-disabled-opacity);
        }

        .btn-close-white {
            --bs-btn-close-filter: invert(1) grayscale(100%) brightness(200%);
        }
    </style>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css">
    <link rel="stylesheet" href="{{ asset('css/mentoria.css') }}">
@endsection

@section('content')
    @include('includes.breadcrumb', [
        'page' => 'Mentoria'
    ])

    <main class="mentoria">
        <div class="content">
            <div class="area-text">
                <h1 class="title animate" data-animate="top">
                    Clique em cada botão para conhecer tudo o que envolve a mentoria:
                </h1>

                <div class="area-buttons">
                    <h2 class="animate" data-animate="left" data-bs-toggle="modal" data-bs-target="#autoconhecimento">
                        Autoconhecimento
                    </h2>

                    <h2 class="animate" data-animate="top" data-bs-toggle="modal" data-bs-target="#conexao">
                        Conexão
                    </h2>

                    <h2 class="animate" data-animate="right" data-bs-toggle="modal" data-bs-target="#integracao">
                        Integração
                    </h2>
                </div>

                <div class="box-itens">
                    <div class="area-item animate" data-animate="top">
                        <div class="item">
                            <div class="area-icone">
                                <img src="{{ asset('img/mentoria/icon-1.webp') }}" alt="" width="55">
                            </div>

                            <h4>
                                Escuta empática
                            </h4>

                            <p>
                                Um espaço seguro onde o mentorado é ouvido com atenção genuína, acolhimento e respeito, permitindo expressar pensamentos e emoções com clareza.
                            </p>
                        </div>

                        <div class="back"></div>
                    </div>
                    
                    <div class="area-item animate" data-animate="top">
                        <div class="item">
                            <div class="area-icone">
                                <img src="{{ asset('img/mentoria/icon-2.webp') }}" alt="" width="55">
                            </div>

                            <h4>
                                Perguntas provocativas
                            </h4>

                            <p>
                                Questões intencionais que ampliam a reflexão, ajudam a enxergar novas perspectivas e estimulam mudanças conscientes.
                            </p>
                        </div>

                        <div class="back"></div>
                    </div>

                    <div class="area-item animate" data-animate="top">
                        <div class="item">
                            <div class="area-icone">
                                <img src="{{ asset('img/mentoria/icon-3.webp') }}" alt="" width="55">
                            </div>

                            <h4>
                                Devolutivas profundas
                            </h4>

                            <p>
                                Retornos construtivos que traduzem percepções, insights e pontos de atenção, favorecendo o autoconhecimento e a clareza.
                            </p>
                        </div>

                        <div class="back"></div>
                    </div>

                    <div class="area-item animate" data-animate="top">
                        <div class="item">
                            <div class="area-icone">
                                <img src="{{ asset('img/mentoria/icon-4.webp') }}" alt="" width="55">
                            </div>

                            <h4>
                                Ferramentas práticas
                            </h4>

                            <p>
                                Métodos aplicáveis que organizam ideias, apoiam decisões e transformam aprendizado em ação de forma objetiva e eficaz.
                            </p>
                        </div>

                        <div class="back"></div>
                    </div>
                </div>
            </div>
        </div>

        <section class="mini-carrossel depoimentos">
            <div class="content">
                <div class="swiper depoimentos animate" data-animate="top">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="item-img">
                                <div class="left">
                                    <div class="img-depoimento">
                                        <img src="{{ asset('img/lead/background-home.webp') }}" alt="Imagem Autor do Depoimento" width="100" height="auto">
                                    </div>
                                </div>

                                <div class="right">
                                    <p class="name">
                                        Letícia Crispim
                                    </p>

                                    <div class="avaliacao-stars">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"/></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"/></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"/></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"/></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"/></svg>
                                    </div>

                                    <p class="text">
                                        "A consultoria foi um divisor de águas na minha vida, tanto profissional quanto pessoal. A Fátima, ela não cuida só de uma parte né? Ela cuidou do 360 da minha vida."
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="swiper-slide">
                            <div class="item-img">
                                <div class="left">
                                    <div class="img-depoimento">
                                        <img src="{{ asset('img/lead/background-home.webp') }}" alt="Imagem Autor do Depoimento" width="100" height="auto">
                                    </div>
                                </div>

                                <div class="right">
                                    <p class="name">
                                        Guilherme Barone
                                    </p>

                                    <div class="avaliacao-stars">
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"/></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"/></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"/></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"/></svg>
                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 640"><path d="M341.5 45.1C337.4 37.1 329.1 32 320.1 32C311.1 32 302.8 37.1 298.7 45.1L225.1 189.3L65.2 214.7C56.3 216.1 48.9 222.4 46.1 231C43.3 239.6 45.6 249 51.9 255.4L166.3 369.9L141.1 529.8C139.7 538.7 143.4 547.7 150.7 553C158 558.3 167.6 559.1 175.7 555L320.1 481.6L464.4 555C472.4 559.1 482.1 558.3 489.4 553C496.7 547.7 500.4 538.8 499 529.8L473.7 369.9L588.1 255.4C594.5 249 596.7 239.6 593.9 231C591.1 222.4 583.8 216.1 574.8 214.7L415 189.3L341.5 45.1z"/></svg>
                                    </div>

                                    <p class="text">
                                        "A sensibilidade, a escuta e a metodologia aplicada pela Fátima fizeram toda a diferença. Sua capacidade de enxergar além das palavras fez toda a diferença durante a mentoria."
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                </div>
            </div>
        </section>
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

    <div class="modal fade" id="autoconhecimento" tabindex="-1" aria-labelledby="autoconhecimentoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="area-close">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <h3>
                    Autoconhecimento
                </h3>

                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta ipsum sint ratione nisi, dolores alias tempore porro molestiae fugiat animi consectetur, voluptas, aperiam minus vitae fugit sapiente corporis esse consequatur.
                </p>

                <section class="mini-carrossel">
                    <div class="content">
                        <div class="swiper galeria-autoconhecimento animate" data-animate="top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="item-img">
                                        <a href="{{ asset('img/lead/background-home.webp') }}" data-fancybox="galeria-autoconhecimento">
                                            <img src="{{ asset('img/lead/background-home.webp') }}" alt="Imagem Carrossel" width="100" height="auto">
                                        </a>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="item-img">
                                        <a href="{{ asset('img/lead/background-home.webp') }}" data-fancybox="galeria-autoconhecimento">
                                            <img src="{{ asset('img/lead/background-home.webp') }}" alt="Imagem Carrossel" width="100" height="auto">
                                        </a>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="item-img">
                                        <a href="{{ asset('img/lead/background-home.webp') }}" data-fancybox="galeria-autoconhecimento">
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
            </div>
        </div>
    </div>

    <div class="modal fade" id="conexao" tabindex="-1" aria-labelledby="conexaoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="area-close">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <h3>
                    Conexão
                </h3>

                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta ipsum sint ratione nisi, dolores alias tempore porro molestiae fugiat animi consectetur, voluptas, aperiam minus vitae fugit sapiente corporis esse consequatur.
                </p>

                <section class="mini-carrossel">
                    <div class="content">
                        <div class="swiper galeria-conexao animate" data-animate="top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="item-img">
                                        <a href="{{ asset('img/lead/background-home.webp') }}" data-fancybox="galeria-conexao">
                                            <img src="{{ asset('img/lead/background-home.webp') }}" alt="Imagem Carrossel" width="100" height="auto">
                                        </a>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="item-img">
                                        <a href="{{ asset('img/lead/background-home.webp') }}" data-fancybox="galeria-conexao">
                                            <img src="{{ asset('img/lead/background-home.webp') }}" alt="Imagem Carrossel" width="100" height="auto">
                                        </a>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="item-img">
                                        <a href="{{ asset('img/lead/background-home.webp') }}" data-fancybox="galeria-conexao">
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
            </div>
        </div>
    </div>

    <div class="modal fade" id="integracao" tabindex="-1" aria-labelledby="integracaoLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content">
                <div class="area-close">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <h3>
                    Integração
                </h3>

                <p>
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Soluta ipsum sint ratione nisi, dolores alias tempore porro molestiae fugiat animi consectetur, voluptas, aperiam minus vitae fugit sapiente corporis esse consequatur.
                </p>

                <section class="mini-carrossel">
                    <div class="content">
                        <div class="swiper galeria-integracao animate" data-animate="top">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="item-img">
                                        <a href="{{ asset('img/lead/background-home.webp') }}" data-fancybox="galeria-integracao">
                                            <img src="{{ asset('img/lead/background-home.webp') }}" alt="Imagem Carrossel" width="100" height="auto">
                                        </a>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="item-img">
                                        <a href="{{ asset('img/lead/background-home.webp') }}" data-fancybox="galeria-integracao">
                                            <img src="{{ asset('img/lead/background-home.webp') }}" alt="Imagem Carrossel" width="100" height="auto">
                                        </a>
                                    </div>
                                </div>

                                <div class="swiper-slide">
                                    <div class="item-img">
                                        <a href="{{ asset('img/lead/background-home.webp') }}" data-fancybox="galeria-integracao">
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
            </div>
        </div>
    </div>

@include('includes.saiba-mais', [
    'title' => 'Saiba mais sobre os meus',
    'subtitle' => 'cursos',
    'route' => 'mentoria'
])

@include('includes.lead', [
    'title' => 'Transforme conhecimento em resultados',
    'subtitle' => 'saiba como!'
])
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>

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
                900: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                1050: {
                    slidesPerView: 3,
                    spaceBetween: 20
                }
            },
        });

        const swiper_galeria2 = new Swiper(".swiper.galeria-autoconhecimento", {
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
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 20
                }
            },
        });

        const swiper_galeria3 = new Swiper(".swiper.galeria-conexao", {
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
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 20
                }
            },
        });

        const swiper_galeria4 = new Swiper(".swiper.galeria-integracao", {
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
                1200: {
                    slidesPerView: 3,
                    spaceBetween: 20
                }
            },
        });
        
        const swiper_depoimentos = new Swiper(".swiper.depoimentos", {
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
                290: {
                    slidesPerView: 1,
                    spaceBetween: 20
                },
                900: {
                    slidesPerView: 2,
                    spaceBetween: 20
                }
            },
        });

        Fancybox.bind('[data-fancybox="galeria"]', {});
        Fancybox.bind('[data-fancybox="galeria-autoconhecimento"]', {});
        Fancybox.bind('[data-fancybox="galeria-conexao"]', {});
        Fancybox.bind('[data-fancybox="galeria-integracao"]', {});
    </script>
@endsection