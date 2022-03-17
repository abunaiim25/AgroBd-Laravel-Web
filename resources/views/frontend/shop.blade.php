@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Shop
@endsection

@php
    $front = App\Models\FrontControl::first();
    $categories = App\Models\Category::where('status', 1)->get();
@endphp

@section('frontend_content')
    <section class=" container featured my-5 pb-5 pt-3">

        <div class="row">


            <div class="col-lg-3 col-md-4 col-12 mt-5 ">


                <div class="hero__categories">
                    <div class="hero__categories__all">
                        <i class="fa fa-bars"></i>
                        <span style="color: black">All Category</span>
                    </div>

                    @php
                         $categories = App\Models\Category::where('status', 1)->get(); 
                    @endphp
                    <div class="overflow">
                        <ul>
                            @foreach ($categories as $row)
                                <li><a
                                        href="{{ url('category_product_show/' . $row->id) }}">{{ $row->category_name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-lg-9 col-md-8 col-12">
                <!--banner-->
                <section id="banner" class="mt-5 pt-5 img-fluid" 
                    style=" background-image: url({{ asset('img_DB/front/shop_banner/' . $front->shop_banner_img) }}); height:60vh!important;">
                    <div class="container">
                        <h4 class="w-50">{{$front->shop_banner_txt1}}</h4>
                        <h1 class="w-50">{{$front->shop_banner_txt2}}</h1>

                    </div>
                </section>
            </div>
        </div>

        <!--product-->
        <div class="mt-5">
            <div class="py-5">
                <h2 class="font-weigth-bold"><strong>Our Featured</strong></h2>
                <hr>
                <p>Here you can check out our new product with fair price on AgroBd</p>
            </div>

            <div class="row ">

                @foreach ($products as $product)
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







        <!--pagination-->
        <div class="d-flex mt-5">
            {{-- (paginate) ->Providers\AppServiceProvider.php --}}
            {{ $products->links() }}
            {{-- {{$appoint->onEachSide(1)-> links()}} --}}
        </div>
    </section>



@endsection
