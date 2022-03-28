<!--Navigation-->

@php
$front = App\Models\FrontControl::first();
@endphp

<nav class="navbar navbar-expand-lg navbar-light bg-light py-2 fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img style="height: 40px;" src="{{ asset('img_DB/front/logo/' . $front->logo_big) }}" alt="">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span><i id="bar" class="fas fa-bars"></i></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <ul class="navbar-nav ml-auto">

                <li class="nav-item   {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
                </li>

                <li class="nav-item   {{ Request::is('shop') ? 'active' : '' }}">
                    <a class="nav-link " aria-current="page" href="{{ url('shop') }}">Shop</a>
                </li>

                <li class="nav-item   {{ Request::is('my_business') ? 'active' : '' }}">
                    <a class="nav-link " aria-current="page" href="{{ url('my_business') }}">MyBusiness</a>
                </li>

                <li class="nav-item   {{ Request::is('news') ? 'active' : '' }}">
                    <a class="nav-link " aria-current="page" href="{{ url('news') }}">News</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        Pages
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li class="nav-item  {{ Request::is('contact') ? 'active' : '' }}">
                            <a class="nav-link " aria-current="page" href="{{ url('contact') }}">Contact Us</a>
                        </li>

                        <li class="nav-item   {{ Request::is('my_orders') ? 'active' : '' }}">
                            <a class="nav-link " aria-current="page" href="{{ url('my_orders') }}">My Orders</a>
                        </li>

                        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                            <a class="nav-link " aria-current="page" href="{{ url('about') }}">About</a>
                        </li>

                    </ul>
                </li>

                {{-- count --}}
                @php
                    $quantity = App\Models\Cart::where('user_id', Auth::id())
                        ->where('user_ip', request()->ip())
                        ->sum('qty');
                    $wishqty = App\Models\Wishlist::where('user_id', Auth::id())
                        ->where('user_id', Auth::id())
                        ->get();
                @endphp

                <li class="nav-item   {{ Request::is('cart') ? 'active' : '' }}">
                    <a href="{{ url('cart') }}" class="nav-link " aria-current="page"><i
                            class="fal fa-shopping-bag"> <small>{{ $quantity }}</small></i></a>
                </li>

                <li class="nav-item   {{ Request::is('wishlist') ? 'active' : '' }}">
                    <a href="{{ url('wishlist') }}" class="nav-link " aria-current="page"><i
                            class="fas fa-heart"><small>{{ count($wishqty) }}</small></i></a>
                </li>



                <li class="nav-item">
                    <form action="{{ url('search_product_item') }}" method="GET" class="search-form">
                        {{ csrf_field() }}

                        <div class="sesrch-box">
                            <div class="icon">
                                <i class="search fal fa-search"></i>
                            </div>
                            <div class="input">
                                <input type="text" name="query" id="query" class="form-control"
                                    placeholder="search products...">
                                <i class="clear fa fa-times"></i>
                            </div>
                        </div>
                    </form>
                </li>
            </ul>

            <div class="d-flex justify-content-end">
                {{-- change --}}
                @if (Route::has('login'))
                    @auth
                        <!--user profile logout-->
                        <x-app-layout>
                        </x-app-layout>
                    @else
                        <a class="nav-link btn login-btn m-1 btn-sm" aria-current="page"
                            href="{{ route('login') }}">Login</a>

                        <a class="nav-link btn login-btn m-1 btn-sm" aria-current="page"
                            href="{{ route('register') }}">Register</a>
                    @endauth
                @endif
            </div>

        </div>
    </div>


</nav>
