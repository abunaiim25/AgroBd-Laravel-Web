@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Category Wise
@endsection


@section('frontend_content')

    <section id="blog-home " class="mt-5 pt-5 container">
        <h2 class="font-weight-bold ">Category Wise Product Show</h2>
        <hr>
    </section>


    <section class=" container featured mt-4  pb-5 ">

        <div class="row">


            <div class="col-lg-3 col-md-4 col-12 mt-4 ">


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



            <div class="col-lg-9 col-md-8 col-12  mt-4 ">

                <div class="row">
                    @foreach ($products as $product)
                        <div class="product text-center col-lg-4 col-md-6 col-12">
                            <a href="{{ url('product_details/' . $product->id) }}">
                                <img class="img-fluid mb-3"
                                    src="{{ asset('img_DB/product/image_one/' . $product->image_one) }}" alt="">
                                
                                <h3>{{ $product->product_name }}</h3>
                                <h6 class="p-price">Price: {{ $product->price }} TK</h6>
                                <button class="buy-btn button-style mt-2">Details</button>
                            </a>
                        </div>
                    @endforeach
                </div>

            </div>
        </div>


        <div class="d-flex mt-5">
            {{-- (paginate) ->Providers\AppServiceProvider.php --}}
            {{ $products->links() }}
            {{-- {{$appoint->onEachSide(1)-> links()}} --}}
        </div>



    </section>








@endsection
