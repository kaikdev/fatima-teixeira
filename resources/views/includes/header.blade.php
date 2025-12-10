<header>
    <div class="content">
        <div class="left animate" data-animate="left">
            <a href="{{ route('home') }}" class="logo">
                <img src="{{ asset('img/logo-fatima-teixeira.webp') }}" alt="Logo Fátima Teixeira" width="320" height="42">
            </a>
        </div>

        <div class="right">
            <ul class="navigation-links">
                <li class="animate" data-animate="top">
                    <a href="{{ route('quem-sou') }}" class="{{ Route::is('quem-sou*') ? 'active' : '' }}">
                        <img src="{{ asset('img/icon-header.webp') }}" alt="Ícone Home" width="14" height="30">
                        Quem sou
                    </a>
                </li>

                <li class="animate" data-animate="top">
                    <a href="{{ route('consultoria') }}" class="{{ Route::is('consultoria*') ? 'active' : '' }}">
                        <img src="{{ asset('img/icon-header.webp') }}" alt="Ícone Home" width="14" height="30">
                        Consultoria
                    </a>
                </li>

                <li class="animate" data-animate="top">
                    <a href="{{ route('mentoria') }}" class="{{ Route::is('mentoria*') ? 'active' : '' }}">
                        <img src="{{ asset('img/icon-header.webp') }}" alt="Ícone Home" width="14" height="30">
                        Mentoria
                    </a>
                </li>

                <li class="animate" data-animate="bottom">
                    <a href="{{ route('cursos') }}" class="{{ Route::is('cursos*') ? 'active' : '' }}">
                        <img src="{{ asset('img/icon-header.webp') }}" alt="Ícone Home" width="14" height="30">
                        Cursos
                    </a>
                </li>

                <li class="animate" data-animate="bottom">
                    <a href="#" class="{{ Route::is('em-foco*') ? 'active' : '' }}">
                        <img src="{{ asset('img/icon-header.webp') }}" alt="Ícone Home" width="14" height="30">
                        Em foco
                    </a>
                </li>

                <li class="animate" data-animate="bottom">
                    <a href="#" class="{{ Route::is('contato*') ? 'active' : '' }}">
                        <img src="{{ asset('img/icon-header.webp') }}" alt="Ícone Home" width="14" height="30">
                        Contato
                    </a>
                </li>
            </ul>

            <div class="btnMobile animate" data-animate="bottom">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
</header>