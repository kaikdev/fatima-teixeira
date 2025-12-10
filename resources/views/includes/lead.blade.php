@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/lead.css') }}">
    @endpush
@endonce

<section class="area-lead">
    <div class="content">
        <div class="box-lead animate" data-animate="left">
            <h2>
                {!! $title !!}
                <span>{!! $subtitle !!}</span>
            </h2>

            <form action="{{ route('lead-submit') }}" method="POST">
                @csrf
                <div class="item-input">
                    <label for="name">Nome</label>
                    <input type="text" id="name" name="nome" required>
                </div>

                <div class="item-input">
                    <label for="whatsapp">WhatsApp</label>
                    <input type="text" id="whatsapp" name="whatsapp" required>
                </div>

                <div class="area-termos">
                    <input id="termos" name="checkbox" type="checkbox" required>

                    <label for="termos">Concordo com os <a href="#">Termos de Uso</a> e <a href="#">Privacidade</a> da Fátima Teixeira</label>
                </div>

                <button class="btn-lead" type="submit">
                    Enviar
                </button>
            </form>
        </div>
    </div>
</section>
