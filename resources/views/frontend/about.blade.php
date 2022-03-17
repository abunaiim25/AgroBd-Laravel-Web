@extends('layouts.frontend_layout')


@section('title')
    AgroBd - About Us
@endsection

@php
    $front = App\Models\FrontControl::first();
@endphp


@section('frontend_content')

    <!--banner-->
    <section id="banner" class="mt-5"
        style=" background-image: url({{ asset('img_DB/front/about_banner/' . $front->about_banner_img) }});  height: 60vh;">
    </section>

    <section id="cart-home " class="mt-5  container">
        <h2 class="font-weight-bold text-center">About Us</h2>
    </section>

    <section class="container ">

        <div class="row">
            <div class="col-lg-8 col-12 mx-auto">
                <p class="text ">{{ $about->about_description }}
                    <span class="more-text">
                        {{ $about->about_description_readmore }}
                    </span>
                </p>
                <button class="read-more-btn">Read More</button>
            </div>
        </div>

    </section>


    <section class="my-5">
        <h2 style="text-align:center; padding-bottom:15px;"><strong> Our Team</strong></h2>
        <div class="container">
            <div class="row">

                <ul id="autoWidth" class="cs-hidden">

                    @foreach ($team as $row)
                        <li class="item-a">
                            <div class="card" style="width: 450px;">
                                <img src="{{ asset('img_DB/team_img/' . $row->team_img) }}" alt="Jane"
                                    style="width:100%; height:250px;">
                                <div class="container mb-3">
                                    <h2 style="line-height: 1;" class="mt-2">{{ $row->team_name }}</h2>
                                   
                                        <p class="title my-2" style="line-height: 1;">{{ $row->team_designation }}</p>
                                   
                                    <p style="line-height: 1; "><small>{{ $row->team_txt }}</small></p>
                                    <p class="mt-2"><small><strong>{{ $row->team_email }}</strong></small></p>
                                </div>
                            </div>
                        </li>
                    @endforeach


                </ul>
            </div>
        </div>
    </section>
@endsection
