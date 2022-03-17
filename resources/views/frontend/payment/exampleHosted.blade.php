<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="SSLCommerz">
    <title>Payment Online</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

    </style>
</head>

<body class="bg-light">
    <div class="container">
        <div class="py-5 text-center">
            <h2>Payment On Online</h2>
        </div>

        @php
            $carts = App\Models\Cart::where('user_id', Auth::id())
                ->latest()
                ->get();
            $subtotal = App\Models\Cart::all()
                ->where('user_id', Auth::id())
                ->where('user_ip', request()->ip())
                ->sum(function ($t) {
                    return $t->price * $t->qty;
                });
        @endphp

<form action="{{ url('/pay') }}" method="POST" class="needs-validation">
        <div class="row mb-5">
            
                <input type="hidden" value="{{ csrf_token() }}" name="_token" />

                <div class="col-md-8 ">
                    <div class="card p-4" style="background: blanchedalmond">
                        <h3 class="mb-3"><strong>Information & Amount</strong></h3>

                        <div class=" mb-3">
                            <label for="firstName">Full name</label>
                            <input type="text" name="name" class="form-control" id="customer_name" placeholder=""
                                value="{{ Auth::user()->name }}" required>
                            <div class="invalid-feedback">
                                Valid customer name is required.
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="email">Email </label>
                            <input type="email" name="email" class="form-control" id="email"
                                placeholder="you@example.com" value="{{ Auth::user()->email }}" readonly>
                            <div class="invalid-feedback">
                                Please enter a valid email address for shipping updates.
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="mobile">Mobile</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">+88</span>
                                </div>
                                <input type="text" name="phone" class="form-control" id="mobile"
                                    placeholder="01xxxxxxxxx" value="" required>
                                <div class="invalid-feedback" style="width: 100%;">
                                    Your Mobile number is required.
                                </div>
                            </div>
                        </div>

                        <div class=" mb-3">
                            <label for="address">Address</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="@address"
                                value="" required>
                            <div class="invalid-feedback">
                                Please enter your shipping address.
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="state">Country/State</label>
                                <input type="text" class="form-control" id="state" name="state" placeholder="state"
                                    required>
                                <div class="invalid-feedback">
                                    Please provide a valid state.
                                </div>
                            </div>
    
                            <div class="col-md-6 mb-3">
                                <label for="post_code">Zip Code</label>
                                <input type="text" class="form-control" id="zip" name="post_code" placeholder="zip code (integer type)"
                                    required>
                                <div class="invalid-feedback">
                                    Zip code required.
                                </div>
                            </div>
    
                            <div class="col-md-6 mb-3 ">
                                <label for="address"><strong>Amount</strong> </label>
                                <input type="text" class="form-control" placeholder="payment" name="amount"
                                    id="total_amount" value="{{ $subtotal }} " required>
                            </div>
    
                        </div>

                        <div class="mb-3">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Something write about shopping if any
                                    (optional):</label>
                                <textarea style="color:black" rows="3" name="description"
                                    class="form-control bg-white " id="exampleInputEmail1" cols="5"></textarea>
                            </div>
                        </div>
                        
                        <hr class="mb-4">
                        <button class="btn btn-dark btn-lg btn-block " type="submit">CONTINUE TO CHECKOUT
                        </button>
                    </div>
                </div>


                {{-- =======================My Order======================== --}}
                <div class="col-md-4 ">
                    <div class="checkout__order">

                        <div class="card p-3" style="background: blanchedalmond">

                            <h3 class="mb-3"><strong>My Order</strong></h3>
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
                                <input type="hidden" name="subtotal" value="{{ $subtotal }}" required>
                                <input type="hidden" name="total" value="{{ $subtotal }}" required>
                            @endif
                        </div>

                    </div>

                </div>

                {{-- ======================= Order Item======================== --}}
        {{--
                @php
                     $carts = App\Models\Cart::where('user_id', Auth::id())->where('user_ip', request()->ip())->latest()->get();
                @endphp
                <input type="text" name="product_id" value="{{$cart->product_id}}">
                <input type="text" name="product_qty" value="{{ $cart->qty }}">
            --}}

    </form>


    </div>


    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</html>
