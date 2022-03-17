@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Business Profile
@endsection

@php
    $front = App\Models\FrontControl::first();
@endphp

@section('frontend_content')
    <section class=" container featured mt-5 pb-5 pt-3">


        <div class="mb-3  pt-5" style="display: flex; justify-content: space-between;">
            <div>
                <section >
                    <h2 class="font-weight-bold ">My Business Profile</h2>
                    <hr>
                </section>
            </div>

            <div class="" style="float:right">
                <a class="btn btn-sm" style="background:#81B622; color:white;" href="{{url('add_business')}}" role="button">Add Business</a>
            </div>

        </div>


        <!--product-->
        <div class="mt-5">
            <div class="row">

                @foreach ($business as $item)
                    <div class="product text-center col-lg-3 col-md-6 col-12">
                        <a href="{{url('profile_business_product_details/'.$item->id)}}">
                        <img class="img-fluid mb-3" src="{{ asset('img_DB/my_business/image_one/' . $item->image_one) }}"
                            alt="">
                      
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
