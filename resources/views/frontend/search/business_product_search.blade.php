@extends('layouts.frontend_layout')


@section('title')
    Online Marketing - Business Search Product
@endsection

@php
$front = App\Models\FrontControl::first();
@endphp

@section('frontend_content')
    <section class=" container featured my-5 pb-5 pt-3">


        <!--product-->
        <div class="">
            <div class="py-5">
                <h2 class="font-weigth-bold"><strong>Business Search Product</strong></h2>
                <hr>
            </div>

            <div class="row mx-auto ">

                @foreach ($business as $item)
                    <div class="product text-center col-lg-3 col-md-6 col-12">
                        <a href="{{ url('business_product_details/' . $item->id) }}">
                            <img class="img-fluid mb-3"
                                src="{{ asset('img_DB/my_business/image_one/' . $item->image_one) }}" alt="">
                            <h3>{{ $item->product_name }}</h3>
                            <h6 class="p-price">Price: {{ $item->price }} TK</h6>
                            <button class="buy-btn button-style">Details</button>
                        </a>
                    </div>
                @endforeach

            </div>
        </div>


        <!--pagination-->
        <div class="d-flex mt-5">
            {{-- (paginate) ->Providers\AppServiceProvider.php --}}
            {{ $business->links() }}
            {{-- {{$appoint->onEachSide(1)-> links()}} --}}
        </div>
    </section>
@endsection
