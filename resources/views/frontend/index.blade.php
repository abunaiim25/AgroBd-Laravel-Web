@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Home
@endsection

@php
$front = App\Models\FrontControl::first();
@endphp

@section('frontend_content')
    <!--Background Image-->
    <section id="home" style=" background-image: url({{ asset('img_DB/front/home/' . $front->home_bg_img) }});  ">
       

        <div class="container bg_text">
            <h5 class="w-50">{{ $front->home_bg_txt1 }}</h5>
            <h1 class="w-50"><b><span>{{ $front->home_bg_txt2 }}</span></b></h1>
            <p class="w-50">{{ $front->home_bg_txt3 }}</p>
            <a class="btn text-uppercase  button-style" href="{{ url('shop') }}" role="button">Agro Shop</a>
        </div>
    </section>

    
                <!--====================day Night Slider=========================-->
     
    <!--Brand-->
    <!--    <section id="brand" class="container">
                         <div class="row m-0 py-5">
                       <img  class="img-fluid col-lg-2 col-md-4 col-6" src="{{ asset('frontend') }}/image/nike.png" alt="">
                        <img  class="img-fluid col-lg-2 col-md-4 col-6 " src="{{ asset('frontend') }}/image/nike.png" alt="">
                         <img  class="img-fluid col-lg-2 col-md-4 col-6 " src="{{ asset('frontend') }}/image/nike.png" alt="">
                       <img  class="img-fluid col-lg-2 col-md-4 col-6 " src="{{ asset('frontend') }}/image/nike.png" alt="">
                         <img  class="img-fluid col-lg-2 col-md-4 col-6 " src="{{ asset('frontend') }}/image/nike.png" alt="">
                          </div>
                           </section>
                         -->


    <!--product-->
    <section class="featured my-5 pb-5">

        <div class="container text-center mt-5 py-5">
            <h3><strong>Our Latest Product</strong></h3>
            <hr class="mx-auto">
            <p>Here you can check out our new product with fair price on AgroBd</p>
        </div>


        <div class="row mx-auto container-fluid">
            <ul id="autoWidth" class="cs-hidden">

                @foreach ($products as $product)
                    <li class="item-a">
                        <div class="product text-center " style="width: 300px;">
                            <a href="{{ url('product_details/' . $product->id) }}">
                                <img class="img-fluid mb-3"
                                    src="{{ asset('img_DB/product/image_one/' . $product->image_one) }}" alt="">

                                <h3>{{ $product->product_name }}</h3>
                                <h6 class="p-price">Price: {{ $product->price }} TK</h6>
                                <button class="buy-btn button-style mt-2">Details</button>
                            </a>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>
    <!--product-->






    <!--new-->
    <section id="new" class="w-100 pb-3">
        <div class="row p-0 m-0 ">

            <div class="one col-lg-4 col-md-12 col-12 p-0">
                <img class="img-fluid" src="{{ asset('img_DB/front/new/new1/' . $front->home_new_txt1_img) }}"
                    alt="">
                <div class="details">
                    <a href="{{ url('shop') }}">Shopping Here</a>
                </div>
            </div>

            <div class="one col-lg-4 col-md-12 col-12 p-0">
                <img class="img-fluid" src="{{ asset('img_DB/front/new/new2/' . $front->home_new_txt2_img) }}"
                    alt="">
                <div class="details">
                    <a href="{{ url('news') }}">News Here</a>
                </div>
            </div>

            <div class="one col-lg-4 col-md-12 col-12 p-0">
                <img class="img-fluid" src="{{ asset('img_DB/front/new/new3/' . $front->home_new_txt3_img) }}"
                    alt="">
                <div class="details">
                    <a href="{{ url('contact') }}">Contact Here</a>
                </div>
            </div>

        </div>
    </section>



    <!--product-->
    <div class="mt-5">

        <div class="container text-center mt-5 py-5">
            <h3><strong>Our Product</strong></h3>
            <hr class="mx-auto">
            <p>Here you can check out our new product with fair price on Online-Marketing</p>
        </div>

        <div class="row mx-auto ">

            @foreach ($products_old as $product)
                <div class="product text-center col-lg-3 col-md-6 col-12">
                    <a href="{{ url('product_details/' . $product->id) }}">
                        <img class="img-fluid mb-3" src="{{ asset('img_DB/product/image_one/' . $product->image_one) }}"
                            alt="">
                        <h3>{{ $product->product_name }}</h3>
                        <h6 class="p-price">Price: {{ $product->price }} TK</h6>
                        <button class="buy-btn button-style mt-2">Details</button>
                    </a>
                </div>
            @endforeach

        </div>

    </div>




    <!--banner-->
    <section id="banner" class="mt-5 pt-5"
        style=" background-image: url({{ asset('img_DB/front/home_banner/' . $front->home_banner_img) }});">
        <div class="container">
            <h4 class="w-50">{{ $front->home_banner_txt1 }}</h4>
            <h1 class="w-50">{{ $front->home_banner_txt2 }}</h1>
            <a class="btn text-uppercase  button-style" href="{{ url('shop') }}" role="button">Agro Shop</a>
        </div>
    </section>
@endsection
