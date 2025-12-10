@once
    @push('styles')
        <link rel="stylesheet" href="{{ asset('css/breadcrumb.css') }}">
    @endpush
@endonce

<div class="breadcrumb">
    <div class="content">
        <ul>
            <li>
                <a href="{{ route('home') }}">Home</a>
            </li>
            
            <li class="separator">
                |
            </li>

            <li>
                {!! $page !!}
            </li>
        </ul>
    </div>
</div>