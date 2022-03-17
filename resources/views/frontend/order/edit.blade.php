@extends('layouts.frontend_layout')


@section('title')
    AgroBd - My Shipping Edit
@endsection


@section('frontend_content')
    <section id="blog-home " class="mt-5 pt-5 container">
        <h2 class="font-weight-bold ">My Shipping Edit</h2>
        <hr>
    </section>


    <div class="container ">
        <div class="m-4">

            <div class="sl-pagebody">
                <div class="row row-sm">

                    
                    <div class="card p-4">

                        <div class="card w-100  mb-3">
                            <h5 class="card-body-title p-3" style="background: #81B622; color:white;"><strong>Shipping
                                    Address</strong></h5>

                            <form action="{{ url('update_my_shipping/'.$shipping->id) }}" method="POST">
                                @csrf
                                <div class="form-layout">
                                    <div class="row  px-3">

                                        <div class="col-lg-4 my-1">
                                            <div class="form-group">
                                                <label class="form-control-label">Name:</label>
                                                <input class="form-control" type="text" name="shipping_name"
                                                    value="{{ $shipping->shipping_name }}" >
                                            </div>
                                        </div>

                                        <div class="col-lg-4 my-1">
                                            <div class="form-group">
                                                <label class="form-control-label">Email address <small>(Not Edit)</small>:</label>
                                                <input class="form-control" type="text" name="shipping_email"
                                                    value="{{ $shipping->shipping_email }}" readonly>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 my-1">
                                            <div class="form-group">
                                                <label class="form-control-label">Shipping Phone: </label>
                                                <input class="form-control" type="text" name="shipping_phone"
                                                    value="{{ $shipping->shipping_phone }}" >
                                            </div>
                                        </div>

                                        <div class="col-lg-4 my-1">
                                            <div class="form-group">
                                                <label class="form-control-label">Shippng Address:</label>
                                                <input class="form-control" type="text" name="address"
                                                    value="{{ $shipping->address }}" >
                                            </div>
                                        </div>

                                        <div class="col-lg-4 my-1">
                                            <div class="form-group">
                                                <label class="form-control-label">State:</label>
                                                <input class="form-control" type="text" name="state"
                                                    value="{{ $shipping->state }}" >
                                            </div>
                                        </div>

                                        <div class="col-lg-4 my-1">
                                            <div class="form-group">
                                                <label class="form-control-label">Post Code: </label>
                                                <input class="form-control" type="text" name="post_code"
                                                    value="{{ $shipping->post_code }}" >
                                            </div>
                                        </div>

                                        <div class="col-12 my-1">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Description (Optional):</label>
                                                <textarea style="color:black" rows="4" name="description"
                                                    class="form-control  " 
                                                    cols="5">{{ $shipping->description }}</textarea>

                                            </div>
                                        </div>
                                    </div>
                                    <button type="submit" class="btn mx-3 mb-3 text-white" >Update</button>
                                </div>

                            </form>
                        </div>



                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
