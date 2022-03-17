@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Product Details
@endsection


@section('frontend_content')

    <!-- (2)Rate Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ url('/add-rating') }}" method="POST">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $products->id }}">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Rate {{ $products->name }}</h5>
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


    <!--product details-->
    <section class="container product_deatils my-5 py-5">

        <div class="row  mt-5">

            <div class="col-lg-5 col-md-12 col-12">
                <img class="img-fluid w-100 pb-1" src="{{ asset('img_DB/product/image_one/' . $products->image_one) }}"
                    id="display_img" alt="">

                <div class="small-img-group">
                    <div class="small-img-col">
                        <img src="{{ asset('img_DB/product/image_two/' . $products->image_two) }}" width="100%"
                            class="small-img " alt="" onclick="myFunctionimg(this)">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ asset('img_DB/product/image_three/' . $products->image_three) }}" width="100%"
                            class="small-img " alt="" onclick="myFunctionimg(this)">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ asset('img_DB/product/image_four/' . $products->image_four) }}" width="100%"
                            class="small-img " alt="" onclick="myFunctionimg(this)">
                    </div>
                    <div class="small-img-col">
                        <img src="{{ asset('img_DB/product/image_one/' . $products->image_one) }}" width="100%"
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

                        <a href="{{ url('add-review/' . $products->id) }}" type="button"
                            class="btn btn-outline-warning mb-2">
                            Write a review
                        </a>
                    </div>

                </div>


            </div>



            <div class="col-lg-6 col-md-12 col-12">
                <h6><a style="text-decoration: none;color:black;" href="{{ url('shop') }}">Shop</a> /
                    {{ $products->category->category_name }}</h6>
                <h2 class="mt-4">{{ $products->product_name }}</h2>
                <h4 class="my-2"> <b>Price: </b>{{ $products->price }} TK <small>(Per kg)</small></h4>


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


                {{-- stock or outOfStock --}}{{-- cart,CheckoutController,shop,OrderController --}}
                <div class="my-2">
                    <b>Availability:</b>
                    @if ($products->product_quantity > 0)
                        <label class="badge bg-success" for=""><span>{{ $products->product_quantity }} </span> kg in
                            stock</label>
                    @else
                        <label class="badge bg-danger" for="">Out Of Stock</label>
                    @endif
                </div>



                <form action="{{ url('cart_add/' . $products->id) }}" method="POST">
                    @csrf
                    <input type="hidden" name="price" value="{{ $products->price }}">
                    <p>
                        <input class="my-2" style="100px!important;" name="qty" value="1" min="1" type="number">KG
                    </p>

                    {{-- stock or outOfStock --}}
                    @if ($products->product_quantity > 0)
                        <button type="submit" class="buy-btn button-style"
                            style="width: 250px; height:45px; border-radius:4px">Buy Now <i
                                class="fas fa-shopping-cart"></i></button>
                    @endif
                </form>

                <a class="btn my-2 buy-btn button-style" style="background: coral; color:white; width: 250px; height:45px"
                    href="{{ url('add_to_wishlist/' . $products->id) }}" role="button">Favourite <i
                        class="fas fa-heart"></i></a>

                <p>
                    <a class="btn" style="background: coral; color:white; width: 250px;"
                        href="{{ url('cart') }}" role="button">Cart <i class="fal fa-shopping-bag"></i></a>
                </p>

                <h2 class="mt-5">Product Details</h2>
                <div style="text-align: justify;">
                    <span>{{ $products->description }}</span>
                </div>
            </div>

        </div>

    </section>


    {{-- Review --}}
    <section>
        <div class="container">
            <div class="card p-4 ">

                <div class="mb-1" style="display: flex; justify-content: space-between;">
                    <div>
                        <h2 class="mx-2">Reviews</h2>
                    </div>
                    <div class="" style="float:right">
                        <a class="btn btn-warning btn-sm " href="{{ url('add-review/' . $products->id) }}" role="button">
                            Write a review</a>
                    </div>
                </div>

                @foreach ($reviews as $item)
                    <div class="card ">
                        <div class="user-review">

                            <div class="card-header px-3" style="line-height: 0.5; background: blanchedalmond">
                                <div style="display: flex; justify-content: space-between;">
                                    <div>
                                        <h3>{{ $item->user->name }}</h3>
                                    </div>

                                    <div class="" style="float:right">
                                        @if ($item->user_id == Auth::id())
                                            <a href="{{ url('delete-review/' . $item->id) }}"
                                                class="float-end bg-danger badge text-white mx-1"
                                                onclick="return confirm('Are You Sure To Delete?')"> <i
                                                    class="fa fa-trash"></i></a>

                                            <a href="{{ url('edit-review/' . $item->id) }}"
                                                class="float-end bg-success badge text-white"> <i
                                                    class="fa fa-pencil"></i></a>
                                        @endif
                                    </div>

                                </div>

                                @php
                                    $rating = App\Models\Rating::where('prod_id', $products->id)
                                        ->where('user_id', $item->user->id)
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
                    <a class="btn btn-success btn-sm m-2" href="{{ url('review_more/' . $products->id) }}"
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
            <p>Here you can check out our new product with fair price on Online-Marketing</p>
        </div>


        <div class="row mx-auto container-fluid">
            <ul id="autoWidth" class="cs-hidden">

                @foreach ($lt_products as $product)
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
@endsection
