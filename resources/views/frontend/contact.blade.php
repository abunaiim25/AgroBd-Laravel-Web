@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Contact
@endsection


@php
    $front = App\Models\FrontControl::first();
@endphp


@section('frontend_content')
    <!--banner-->
    <section id="banner" class="mt-5"
        style=" background-image: url({{ asset('img_DB/front/contact_banner/' . $front->contact_banner_img) }});  height: 60vh !important;">
    </section>

    <section id="cart-home " class="mb-5 pt-5 container ">
        <h2 class="font-weight-bold text-center">Contact Us</h2>
    </section>

    <section class=" mb-5 pb-5">
        <div class="w-50 mx-auto">
            <form class="main-form" action="{{ url('contact_submit') }}" method="POST">
                @csrf

                <div class="row mt-5">
                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft">
                        <input type="text" name="name" class="form-control" placeholder="Full name" required>
                    </div>

                    <div class="col-12 col-sm-6 py-2 wow fadeInRight">
                        <input type="text" name="email" class="form-control" placeholder="Email address" required>
                    </div>

                    <div class="col-12 col-sm-6 py-2 wow fadeInLeft" data-wow-delay="300ms">
                        <input type="date" name="date" class="form-control" required>
                    </div>

                    <div class="col-12 col-sm-6 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <input type="text" name="phone" class="form-control" placeholder="Number" required>
                    </div>

                    <div class="col-12 py-2 wow fadeInUp" data-wow-delay="300ms">
                        <textarea name="message" id="message" class="form-control" rows="6" placeholder="Enter message..."
                            required></textarea>
                    </div>

                </div>

                <button type="submit" class="btn mt-3 wow zoomIn text-white">Submit Contact</button>
            </form>
        </div>
    </section>
@endsection
