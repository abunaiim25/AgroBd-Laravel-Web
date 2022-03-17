@extends('layouts.frontend_layout')


@section('title')
    AgroBd - My Orders
@endsection


@section('frontend_content')
    <section id="blog-home " class="mt-5 pt-5 container">
        <h2 class="font-weight-bold ">My Orders <small>(Online Cash)</small></h2>
        <hr>
    </section>


    <div class="container ">
        <div class="m-4">

            <div class="sl-pagebody">
                <div class="row row-sm">

                    <div class="mb-3" style="display: flex; justify-content: space-between;">
                        <div>
                           
                        </div>

                        <div class="" style="float:right">
                            <a class="btn btn-success btn-sm" href="{{url('my_shipping_edit_payment/' . $order->id)}}" role="button">Shipping Only Editing  <i class="fa fa-pencil"></i></a>
                        </div>
                    </div>
                    <div class="card p-4">

                        <div class="card  mb-3">
                            <h5 class="card-body-title p-3" style="background: #81B622; color:white;"><strong>Order Item</strong>
                            </h5>
                            <div class="form-layout">
                                <div class="table-wrapper " style="overflow: auto">
                                    <table class="table  table-striped p-3">
                                        <thead>
                                            <tr>
                                                <th class="wd-15p">Image</th>
                                                <th class="wd-15p">Poduct Name</th>
                                                <th class="wd-15p">Quantity</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($orderItems as $row)
                                                <tr>
                                                    <td>
                                                        <img src="{{ asset('img_DB/product/image_one/' . $row->product->image_one) }}"
                                                            height="150px;" width="150px;" alt="img">
                                                    </td>

                                                    <td>
                                                        <span class="py-1 px-2 rounded text-black"
                                                            style="background:greenyellow">{{ $row->product->product_name }}</span>
                                                    </td>

                                                    <td>
                                                        <span class="py-1 px-2 rounded text-black"
                                                            style="background:greenyellow">{{ $row->product_qty }}</span>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div><!-- table-wrapper -->
                            </div><!-- form-layout -->
                        </div>


                        <div class="card mb-3">
                            <h5 class="card-body-title p-3" style="background: #81B622; color:white;"><strong>Orders</strong>
                            </h5>
                            <div class="form-layout">
                                <div class="row p-3">

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Invoice NO: </label>
                                            <input class="form-control" type="text"
                                                value="#{{ $order->invoice_no }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Payment Type: </label>
                                            <input class="form-control" type="text" name="lastname"
                                                 value="Hand Cash" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Sub Total:</label>
                                            <input class="form-control" type="text" name="email"
                                                 value="{{ $order->subtotal }} TK" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Total:</label>
                                            <input class="form-control" type="text" name="email"
                                                 value="{{ $order->total }} TK" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Discount: </label>

                                            @if ($order->discount_percentage == null)
                                                <span class="py-1 px-2 rounded text-white" style="background:red;">No</span>
                                            @else
                                                <span
                                                    class="py-1 px-2 rounded text-white bg-success">{{ $order->discount_percentage }}%</span>
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="card w-100  mb-3">
                            <h5 class="card-body-title p-3" style="background: #81B622; color:white;"><strong>Shipping
                                    Address</strong></h5>
                            <div class="form-layout">
                                <div class="row  p-3">

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Name:</label>
                                            <input class="form-control" type="text"
                                                value="{{ $shipping->name }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Email address: </label>
                                            <input class="form-control" type="text" 
                                                value="{{ $shipping->email }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Shipping Phone: </label>
                                            <input class="form-control" type="text" 
                                                value="{{ $shipping->phone }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Shippng Address:</label>
                                            <input class="form-control" type="text" 
                                                value="{{ $shipping->address }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">State:</label>
                                            <input class="form-control" type="text" 
                                                value="{{ $shipping->state }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Post Code: </label>
                                            <input class="form-control" type="text" 
                                                value="{{ $shipping->post_code }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Transaction Id: </label>
                                            <input class="form-control" type="text" 
                                                value="{{ $shipping->transaction_id }}" readonly>
                                        </div>
                                    </div>

                                    
                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Currency: </label>
                                            <input class="form-control" type="text" 
                                                value="{{ $shipping->currency }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Payment In Online: </label>
                                            <input class="form-control" type="text" 
                                               value="{{ $shipping->amount }} TK"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-12 my-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description (Optional)</label>
                                            <textarea style="color:black" rows="4" name="description" class="form-control  "
                                                readonly cols="5">{{ $shipping->description }}</textarea>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
