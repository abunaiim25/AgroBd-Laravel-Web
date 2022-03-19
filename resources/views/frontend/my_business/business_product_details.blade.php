@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Business Product Details
@endsection


@section('frontend_content')

 <!-- (2)Rate Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ url('business_add_rating') }}" method="POST">
                @csrf
                <input type="hidden" name="business_product_id" value="{{ $business->id }}">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Rate {{ $business->name }}</h5>
                    <button style="color: white; background-color: green!important; " type="button"
                        class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        X</button>
                </div>
                <div class="modal-body">
                    <div class="rating-css">
                        <div class="star-icon">
                            @if ($user_rating)
                                @for ($i = 1; $i <= $user_rating->stars_rated; $i++)
                                    <input type="radio" value="{{ $i }}" name="product_rating" checked
                                        id="rating{{ $i }}">
                                    <label for="rating{{ $i }}" class="fa fa-star"></label>
                                @endfor
                                @for ($j = $user_rating->stars_rated + 1; $j <= 5; $j++)
                                    <input type="radio" value="{{ $j }}" name="product_rating"
                                        id="rating{{ $j }}">
                                    <label for="rating{{ $j }}" class="fa fa-star"></label>
                                @endfor
                            @else
                                <input type="radio" value="1" name="product_rating" checked id="rating1">
                                <label for="rating1" class="fa fa-star"></label>
                                <input type="radio" value="2" name="product_rating" id="rating2">
                                <label for="rating2" class="fa fa-star"></label>
                                <input type="radio" value="3" name="product_rating" id="rating3">
                                <label for="rating3" class="fa fa-star"></label>
                                <input type="radio" value="4" name="product_rating" id="rating4">
                                <label for="rating4" class="fa fa-star"></label>
                                <input type="radio" value="5" name="product_rating" id="rating5">
                                <label for="rating5" class="fa fa-star"></label>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button style="background-color: green!important; border: none;" type="button"
                        class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button style="background-color:green!important; border: none;" type="submit"
                        class="btn btn-primary">Submit</button>
                </div>

            </form>

        </div>
    </div>
</div>



<div class="container mt-5 pt-5" style="display: flex; justify-content: space-between;">
    <div class="">
        <h3><a style="text-decoration: none;color:black;" href="{{ url('my_business') }}">MyBusiness</a> /
            {{ $business->category }}</h3>
    </div>

    {{-- search --}}
    <div class="" style="float:right">
        <form action="{{ url('search_business_query') }}" method="GET" class="search-form">
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


    <!--product details-->
    <section class="container product_deatils mt-3">
        <div class="row  ">
            <div class="col-lg-5 col-md-12 col-12">
                <img class="img-fluid w-100 pb-1" src="{{ asset('img_DB/my_business/image_one/' . $business->image_one) }}"
                    id="display_img" alt="">

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

                <div class="row mt-3 ">
                    <div class="col-md-12">
                        <!-- (1) Rate Button trigger modal (ShopController 4)-->
                        <button style="background-color: white!important; color:black!important" type="button"
                            class="btn btn-outline-dark mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fa fa-star checked"></i> Rate this product
                        </button>

                        <a href="{{ url('add_review_business/' . $business->id) }}" type="button"
                            class="btn btn-outline-warning mb-2">
                            Write a review
                        </a>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 col-md-12 col-12">
                <h6><a style="text-decoration: none;color:black;" href="{{ url('my_business') }}">MyBusiness</a> /
                    {{ $business->category }}</h6>
                <h2 class="mt-4">{{ $business->product_name }}</h2>
                <h4 class="my-2"> <b>Price: </b>{{ $business->price }} TK <small>(Per kg)</small></h4>


                <!-- (3) ratings-->
                @php $ratenum = number_format($rating_value)  @endphp
                <div class="rating">
                    @for ($i = 1; $i <= $ratenum; $i++)
                        <i class="fa fa-star checked"></i>
                    @endfor
                    @for ($j = $ratenum + 1; $j <= 5; $j++)
                        <i class="fa fa-star"></i>
                    @endfor
                    <span>
                        @if ($ratings->count() > 0)
                            {{ $ratings->count() }} Ratings
                        @else
                            No Ratings
                        @endif
                    </span>
                </div>

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
                    <h3 class="p-3" style="background-color: #81B622; color:white;"><strong>Contact me for {{ $business->product_name }}</strong> </h3>

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


        {{-- Review --}}
        <section class="mt-5">
            <div class="container">
                <div class="card p-4 ">
    
                    <div class="mb-1" style="display: flex; justify-content: space-between;">
                        <div>
                            <h2 class="mx-2">Reviews</h2>
                        </div>
                        <div class="" style="float:right">
                            <a class="btn btn-warning btn-sm " href="{{ url('add_review_business/' . $business->id) }}" role="button">
                                Write a review</a>
                        </div>
                    </div>

            
    
                    @foreach ($reviews as $item)
                        <div class="card ">
                            <div class="user-review">
    
                                <div class="card-header px-3" style="line-height: 0.5; background: blanchedalmond">
                                    <div style="display: flex; justify-content: space-between;">
                                        <div>
                                            <h3>{{ $item->name }}</h3>{{--join--}}
                                        </div>
    
                                        <div class="" style="float:right">
                                            @if ($item->user_id == Auth::id())
                                                <a href="{{ url('delete_review_business/' . $item->id) }}"
                                                    class="float-end bg-danger badge text-white mx-1"
                                                    onclick="return confirm('Are You Sure To Delete?')"> <i
                                                        class="fa fa-trash"></i></a>
    
                                                <a href="{{ url('edit_review_business/' . $item->id) }}"
                                                    class="float-end bg-success badge text-white"> <i
                                                        class="fa fa-pencil"></i></a>
                                            @endif
                                        </div>
    
                                    </div>
    
                                    @php
                                        $rating = App\Models\Business\RatingBusiness::where('prod_id', $business->id)
                                            ->where('user_id', $item->user_id)
                                            ->first();
                                    @endphp
                                    @if ($rating)
                                        @php
                                            $user_rated = $rating->stars_rated;
                                        @endphp
                                        @for ($i = 1; $i <= $user_rated; $i++)
                                        <small><i class="fa fa-star checked"></i></small>
                                        @endfor
                                        @for ($j = $user_rated + 1; $j <= 5; $j++)
                                        <small><i class="fa fa-star"></i></small>
                                        @endfor
                                    @endif
                                    
                                    <small>{{ $item->created_at->diffForHumans() }}</small>
                                </div>
    
                                <p class="my-2 px-3">
                                    {{ $item->user_review }}
                                </p>
                            </div>
                        </div>
                    @endforeach
    
                    @if ($reviews->count() > 2)
                        <a class="btn btn-success btn-sm m-2" href="{{ url('review_more_business/' . $business->id) }}"
                            role="button">Reviews See More</a>
                    @endif
    
                </div>
            </div>
        </section>


    <!--product-->
    <section class="featured my-5 pb-5">

        <div class="container text-center mt-5 py-5">
            <h3><strong>Our Latest Product</strong></h3>
            <hr class="mx-auto">
            <p>Here you can check out our new product with fair price on AgroBd</p>
        </div>


        <div class="row mx-auto container-fluid">
            <ul id="autoWidth" class="cs-hidden">

                @foreach ($lts_business as $product)
                    <li class="item-a">
                        <div class="product text-center " style="width: 300px;">
                            <a href="{{ url('business_product_details/' . $product->id) }}">
                                <img class="img-fluid mb-3"
                                    src="{{ asset('img_DB/my_business/image_one/' . $product->image_one) }}" alt="">

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
@endsection
