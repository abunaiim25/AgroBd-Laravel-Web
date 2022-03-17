@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Cart
@endsection


@section('frontend_content')

    <style>
        .big-hr {
            width: 100% !important;
        }

    </style>

    <section id="cart-home " class="mt-5 pt-5 container">
        <h2 class="font-weight-bold ">Shopping Cart</h2>
        <hr>
    </section>


    <section class="cart container py-5 mb-5">

        @if ($carts->count() > 0)
            <table width="100%">
                <thead>
                    <tr>
                        <td>Product</td>
                        <td>Image</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                        <td>Remove</td>
                    </tr>
                </thead>

                <tbody>

                    @foreach ($carts as $cart)
                        <tr>
                            <td>
                                <p class="font-weight-bold">{{ $cart->product->product_name }}</p>
                            </td>
                            <td><img class="img-fluid"
                                    src="{{ asset('img_DB/product/image_one/' . $cart->product->image_one) }}" alt="">
                            </td>
                            <td>
                                <p><small> {{ $cart->price }} TK</small></p>
                            </td>

                            {{-- stock or outOfStock --}}
                            <td>
                                @if ($cart->product->product_quantity >= $cart->qty)
                                    <form action="{{ url('cart_quantity_update/' . $cart->id) }}" method="POST">
                                        @csrf
                                        <input style="width: 70px; padding-left:3px;" name="qty" value="{{ $cart->qty }}"
                                            min="1" type="number">
                                        <button type="submit" class="btn btn-sm text-white">Update</button>
                                    </form>
                                @else
                                <label class="badge bg-danger" for="">Out of stock</label>
                                @endif
                            </td>


                            <td>
                                <p><small> {{ $cart->price * $cart->qty }} TK</small></p>
                            </td>
                            <td><a href="{{ url('cart_destroy/' . $cart->id) }}"><i class="fas fa-trash"></i></a></td>
                        </tr>
                    @endforeach

                </tbody>

            </table>

            <a class="btn float-end mt-3" style="background: #81B622; color:#fff" href="{{ url('shop') }}" role="button">Continue
                to Shopping</a>

        @else
            <div class="card p-5 text-white" style="background: coral">
                <h2 class="text-center ">Carts Not Available</h2>
                <a class="btn float-end" style="background: coral; color:#fff" href="{{ url('shop') }}" role="button">Continue
                    to Shopping</a>
            </div>
        @endif
    </section>


    <section class="cart-bottom container">
        <div class="row">

            @if (Session::has('discount'))
            @else
                <div class="coupon col-lg-6 col-md-6 col-12 mb-5">
                    <div class="border">
                        <h5>DISCOUNT</h5>

                        <form action="{{ url('discount_apply') }}" method="POST">
                            @csrf
                            <div class="padding">
                                <p class="my-2">Enter your discount code if you have one</p>
                                <input type="text" placeholder="Discount Codes" name="discount_name">
                                <button class="apply-btn button-style">APPLY DISCOUNT</button>
                            </div>
                        </form>

                    </div>
                </div>
            @endif

            <div class="total col-lg-6 col-md-6 col-12 mb-5">
                <div class="border pb-3">
                    <h5>CART TOTAL</h5>

                    @if (Session::has('discount'))
                        <div class="padding">
                            <div class="d-flex justify-content-between  mt-2 mx-3">
                                <h6>Subtotal</h6>
                                <p>{{ $subtotal }} TK</p>
                            </div>
                            <div class="d-flex justify-content-between  mx-3">
                                <h6>Discount Name</h6>
                                <p>{{ session()->get('discount')['discount_name'] }}
                                    <a href="{{ url('discount_destroy') }}"><span
                                            style="color: coral;  text-decoration: none;">X</span> </a>
                                </p>
                            </div>
                            <div class="d-flex justify-content-between  mx-3">
                                <h6>Discount</h6>
                                <p>{{ session()->get('discount')['discount_percentage'] }}% (
                                    {{ session()->get('discount')['discount_amount'] }} tk )</p>
                            </div>
                            <hr class="big-hr my-2">

                            <div class="d-flex justify-content-between  mx-3">
                                <h6><strong> Total</strong></h6>
                                <p> <strong>{{ $subtotal - session()->get('discount')['discount_amount'] }}</strong></p>
                            </div>
                        </div>

                    @else
                        <div class="d-flex justify-content-between my-3 mx-3">
                            <h6><strong> Total</strong></h6>
                            <p> <strong>{{ $subtotal }} TK</strong></p>
                        </div>
                    @endif

                    <div class=" text-right my-4 mx-3 ">
                        <a class="button-style" style="text-decoration: none" href="{{ url('checkout') }}">PROCEED TO
                            CHECKOUT</a>
                    </div>

                </div>
            </div>
        </div>
        </div>
    </section>


@endsection
