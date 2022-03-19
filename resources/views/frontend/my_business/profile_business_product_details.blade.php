@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Profile Product Details
@endsection


@section('frontend_content')
    <div class="container mt-5 pt-5" style="display: flex; justify-content: space-between;">
        <div class="">
            <h3><a style="text-decoration: none;color:black;" href="{{ url('business_profile') }}">My Business Profile</a>
                /
                {{ $business->category }}</h3>

        </div>


        <div class="p-3" style="float:right; background:wheat; border-radius:5px; ">

            @if ($business->status == 1)
                <a href="{{ url('business_zero/' . $business->id) }}" class="btn float-end bg-danger badge text-white "><i
                        class="fa fa-arrow-down"></i></a>
            @else
                <a href="{{ url('business_one/' . $business->id) }}" class="btn float-end bg-success badge text-white "><i
                        class="fa fa-arrow-up"></i></a>
            @endif

            <a href="{{ url('delete_business/' . $business->id) }}" class="float-end bg-danger badge text-white mx-1"
                onclick="return confirm('Are You Sure To Delete?')"> <i class="fa fa-trash"></i></a>

            <a href="{{ url('edit_business/' . $business->id) }}" class="float-end bg-success badge text-white"> <i
                    class="fa fa-pencil"></i></a>
        </div>
    </div>


    <!--product details-->
    <section class="container product_deatils mt-3 mb-5">
        <div class="row  ">
            <div class="col-lg-5 col-md-12 col-12">
                <img class="img-fluid w-100 pb-1"
                    src="{{ asset('img_DB/my_business/image_one/' . $business->image_one) }}" id="display_img" alt="">

                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="{{ asset('img_DB/my_business/image_two/' . $business->image_two) }}" width="100%"
                            class="small-img " alt="" onclick="myFunctionimg(this)">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ asset('img_DB/my_business/image_three/' . $business->image_three) }}" width="100%"
                            class="small-img " alt="" onclick="myFunctionimg(this)">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ asset('img_DB/my_business/image_four/' . $business->image_four) }}" width="100%"
                            class="small-img " alt="" onclick="myFunctionimg(this)">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ asset('img_DB/my_business/image_one/' . $business->image_one) }}" width="100%"
                            class="small-img " alt="" onclick="myFunctionimg(this)">
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-12 col-12">
                <h6><a style="text-decoration: none;color:black;" href="{{ url('business_profile') }}">My Business
                        Profile</a> /
                    {{ $business->category }}</h6>
                <h2 class="mt-4">{{ $business->product_name }}</h2>
                <h4 class="my-2"> <b>Price: </b>{{ $business->price }} TK <small>(Per kg)</small></h4>

                {{-- stock or outOfStock --}}
                <div class="my-2">
                    <b>Availability:</b>
                    @if ($business->product_quantity > 0)
                        <label class="badge bg-success" for=""><span>{{ $business->product_quantity }} </span> kg in
                            stock</label>
                    @else
                        <label class="badge bg-danger" for="">Out Of Stock</label>
                    @endif
                </div>

                <h2 class="mt-3">Product Details</h2>
                <div style="text-align: justify;">
                    <span>{{ $business->product_description }}</span>
                </div>

                <div class="card mt-5">
                    <h3 class="p-3" style="background-color: #81B622; color:white;"><strong>Contact me for
                            {{ $business->product_name }}</strong> </h3>

                    <div class="row   p-3">

                        <div class="col-lg-6 col-md-6 col-12">
                            <p><strong> Name:</strong> {{ $business->name }}</p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <p><strong> Email:</strong> {{ $business->email }}</p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <p><strong> Phone:</strong> {{ $business->phone }}</p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <p><strong> Village/House:</strong> {{ $business->village }}</p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <p><strong> Road/Block/Sector:</strong> {{ $business->road }}</p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <p><strong> Police Station:</strong> {{ $business->police_station }}</p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <p><strong> Post Office:</strong> {{ $business->post_office }}</p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <p><strong>District:</strong> {{ $business->district }}</p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <p><strong> Post Code:</strong> {{ $business->post_code }}</p>
                        </div>

                        <div class="col-lg-6 col-md-6 col-12">
                            <p><strong>Country:</strong> {{ $business->country }}</p>
                        </div>

                        <div class="col-lg-12 col-md-12 col-12 mt-2">
                            <p><strong>About our address:</strong> {{ $business->personal_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>




    </section>
@endsection
