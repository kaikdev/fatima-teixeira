@php
    $src = null;
    if ($getState()) {
        preg_match('/(?:youtube\.com\/(?:shorts\/|(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=))|youtu\.be\/)([^"&?\/\s]{11})/', $getState(), $matches);
        $src = $matches[1] ?? null;
    }
@endphp

@if($src)
    <iframe width="100%" height="350" src="{{ 'https://www.youtube.com/embed/'.$src.'?si=prHUlOCboAu-oKuw' }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
@else
    <p style="color:#666; font-size:14px;">Cole o código do iframe acima para visualizar.</p>
@endif
