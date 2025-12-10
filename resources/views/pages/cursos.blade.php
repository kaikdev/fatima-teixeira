@extends('layouts.layout')

{{-- SEO --}}
@section('title', 'Cursos')
@section('description-seo', !empty($metatag) ? $metatag->descricao : getItem('client'))

@section('head')
    <link rel="stylesheet" href="{{ asset('css/cursos.css') }}">
@endsection

@section('content')
    @include('includes.breadcrumb', [
        'page' => 'Cursos'
    ])

    <main class="cursos">
        <div class="content">
            <div class="area-text">
                <h1 class="title animate" data-animate="top">
                    Cursos
                </h1>


            </div>
        </div>
    </main>

@include('includes.saiba-mais', [
    'title' => 'Entre em contato',
    'subtitle' => 'comigo',
    'route' => 'contato'
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

        Fancybox.bind('[data-fancybox="galeria"]', {});
    </script>
@endsection