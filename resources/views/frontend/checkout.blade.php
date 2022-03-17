@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Checkout
@endsection

<style>
    .big-hr {
        width: 100% !important;
    }

</style>


@section('frontend_content')
    <section id="cart-home " class="mt-5  pt-5 container">
        <h2 class="font-weight-bold ">Checkout</h2>
        <hr>
    </section>


    <!-- Checkout Section Begin -->
    <section class="checkout mb-5">
        <div class="container">

            <div class="checkout__form">

                <form action="{{ url('place_order') }}" method="POST">
                    @csrf

                    <div class="row">


                        <div class="col-lg-8 col-md-6 col-12 mt-4">
                            <h3 class="mb-3"><strong>Shipping Address</strong> <small class="text-danger">(This
                                    Form For Payment On Hand Cash)</small></h3>
                            <div class="card p-3" style="background: blanchedalmond">
                                <div class="row">

                                    <input type="hidden" name="User_id" value="{{ Auth::user()->id }}">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Name: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="shipping_name" placeholder="name" value="{{ Auth::user()->name }}"
                                                readonly>
                                            @error('shipping_name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Email: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="shipping_email" placeholder="email"
                                                value="{{ Auth::user()->email }}" readonly>
                                            @error('shipping_email')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Phone:<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="shipping_phone" placeholder="phone" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Address: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="address" placeholder="address" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Country/State: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="state" placeholder="country/state" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Zip Code: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="post_code" placeholder="zip code (integer type)" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Something write about shopping if any
                                                (optional):</label>
                                            <textarea style="color:black" rows="3" name="description"
                                                class="form-control bg-white " id="exampleInputEmail1" cols="5"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-4 col-md-6 col-12 mt-4">

                            <div class="checkout__order">
                                <h3 class="mb-3"><strong>My Order</strong></h3>

                                <div class="card p-3" style="background: blanchedalmond">

                                    @foreach ($carts as $cart)
                                        <div class="d-flex justify-content-between  mt-2 ">
                                            <h6>{{ $cart->product->product_name }} ({{ $cart->qty }})</h6>
                                            <p>{{ $cart->price * $cart->qty }} TK</p>
                                        </div>
                                    @endforeach

                                    <hr class="big-hr my-2">

                                    @if (Session::has('discount'))
                                        <div class="d-flex justify-content-between  mt-2">
                                            <h6>Subtotal</h6>
                                            <p>{{ $subtotal }} TK</p>
                                        </div>

                                        <div class="d-flex justify-content-between  ">
                                            <h6>Discount</h6>
                                            <p>{{ session()->get('discount')['discount_percentage'] }}% (
                                                {{ session()->get('discount')['discount_amount'] }} tk )</p>
                                        </div>

                                        <div class="d-flex justify-content-between  ">
                                            <h6> <strong>Total</strong></h6>
                                            <p> <strong>{{ $subtotal - session()->get('discount')['discount_amount'] }}
                                                    TK</strong></p>
                                        </div>
                                        <input type="hidden" name="discount_percentage"
                                            value="{{ session()->get('discount')['discount_percentage'] }}">
                                        <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                        <input type="hidden" name="total"
                                            value="{{ $subtotal - session()->get('discount')['discount_amount'] }}">
                                    @else
                                        <div class="d-flex justify-content-between my-2">
                                            <h6><strong> Total</strong></h6>
                                            <p> <strong>{{ $subtotal }} TK</strong></p>
                                        </div>
                                        <input type="hidden" name="subtotal" value="{{ $subtotal }}">
                                        <input type="hidden" name="total" value="{{ $subtotal }}">
                                    @endif

                                    <h5 class="mt-3"><strong> Select Payment Method</strong></h5>

                                    <div class="checkout__input__checkbox">
                                        <label for="payment">
                                            <p><small> HansCash</small>
                                                <input type="radio" value="HandCash" name="payment_type"
                                                    style="color: black" required>
                                            </p>
{{--
                                            <p><small> OnlineCash</small>
                                                <input type="radio" value="OnlinePayment" name="payment_type"
                                                    style="color: black">
                                                <span class="checkmark  @error('payment_type') is-invalid @enderror"></span>
                                            </p>
--}}
                                            @error('payment_type')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </label>
                                    </div>
                                    
                                    <button type="submit" style="border-radius: 4px" class=" button-style">PLACE ORDER
                                        (Hand Cash)</button>
                                    <div class="mx-auto">
                                        <small>OR</small>
                                    </div>
                                    <a href="{{ url('example2') }}" type="submit"
                                        class="btn button-style text-white">Online Payment</a>



                                </div>

                            </div>

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
