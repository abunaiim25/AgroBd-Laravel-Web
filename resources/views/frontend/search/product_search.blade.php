@extends('layouts.frontend_layout')


@section('title')
    Online Marketing - Search Product
@endsection

@php
    $front = App\Models\FrontControl::first();
@endphp

@section('frontend_content')
    <section class=" container featured my-5 pb-5 pt-3">


        <!--product-->
        <div class="mt-5">
            <div class="py-5">
                <h2 class="font-weigth-bold"><strong>Search Product</strong></h2>
                <hr>
            </div>

            <div class="row mx-auto ">

                @foreach ($products as $product)
                    <div class="product text-center col-lg-3 col-md-6 col-12">
                        <a href="{{ url('product_details/' . $product->id) }}">
                        <img class="img-fluid mb-3" src="{{ asset('img_DB/product/image_one/' . $product->image_one) }}"
                            alt="">
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h3>{{ $product->product_name }}</h3>
                        <h6 class="p-price">Price: {{ $product->price }} TK</h6>
                        <button class="buy-btn button-style">Details</button>
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
