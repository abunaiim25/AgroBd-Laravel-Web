@extends('layouts.frontend_layout')


@section('title')
    AgroBd - My Business
@endsection

@php
$front = App\Models\FrontControl::first();
@endphp

@section('frontend_content')
    <section class=" container featured mt-5 pb-5 pt-3">


        <div class="mb-3  pt-5" style="display: flex; justify-content: space-between;">
            <div>
                <a class="btn btn-warning btn-sm" href="{{ url('business_profile') }}" role="button">My Business Profile</a>
                <a class="btn btn-sm" style="background:#81B622; color:white;" href="{{ url('add_business') }}"
                    role="button">Add Business</a>
            </div>

            {{-- search --}}
            <div class="" style="float:right">
                <form action="{{ url('search_news_query') }}" method="GET" class="search-form">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div style="display: flex; justify-content: space-between;">
                            <input type="text" name="query" id="query" class="form-control mr-1" {{-- value="{{request()->input('query')}}" --}}
                                placeholder="search business...">

                            <button type="submit" class="btn text-white"> <i class="search fal fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-12">
                <!--banner-->
                <section id="banner" class=" img-fluid"
                    style=" background-image: url({{ asset('img_DB/front/shop_banner/' . $front->shop_banner_img) }}); height:55vh!important;">
                </section>
            </div>
        </div>


        <!--product-->
        <div class="">
            <div class="py-5">
                <h2 class="font-weigth-bold"><strong>Business Featured</strong></h2>
                <hr>
                <p>Here you can check out our new product with fair price on AgroBd</p>
            </div>

            <div class="row ">

                @foreach ($business as $item)
                    <div class="product text-center col-lg-3 col-md-6 col-12">
                        <a href="{{ url('business_product_details/' . $item->id) }}">
                            <img class="img-fluid mb-3"
                                src="{{ asset('img_DB/my_business/image_one/' . $item->image_one) }}" alt="">

                            <h3>{{ $item->product_name }}</h3>
                            <h6 class="p-price">Price: {{ $item->price }} TK</h6>
                            <button class="buy-btn button-style mt-2">Details</button>
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
