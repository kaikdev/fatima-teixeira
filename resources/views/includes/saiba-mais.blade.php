@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/saiba-mais.css') }}">
    @endpush
@endonce

<section class="saiba-mais">
    <div class="content">
        <div class="area-text animate" data-animate="left">
            <img src="{{ asset('img/logo-icon-fatima.webp') }}" alt="Logo Fátima Teixeira" width="106" height="auto">
            
            <h3>
                {!! $title !!}
                
                <a href="{{ route($route) }}">
                    {!! $subtitle !!}
                </a>
            </h3>
        </div>
    </div>
</section>