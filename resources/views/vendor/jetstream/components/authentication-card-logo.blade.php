@php
$front = App\Models\FrontControl::first();
@endphp

<a href="/">
    <img style="height: 40px;" src="{{ asset('img_DB/front/logo/' . $front->logo_big) }}" alt="">
</a>
