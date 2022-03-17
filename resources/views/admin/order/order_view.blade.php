<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Order View</title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />



</head>

<body style="background: #1e273b">

    <div class="container">
        <div class="sl-mainpanel m-4">

            <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item  text-white" style="text-decoration: none"
                    href="{{ url('/home') }}">Order</a>
                <span class="breadcrumb-item active text-white">Order View</span>
            </nav>

            <div class="sl-pagebody">
                <div class="row row-sm">

                    <div class="card p-4">

                        <div class="mb-3" style="display: flex; justify-content: space-between;">
                            <div>
                                <h6 class="card-body-title" style="float:left"><strong>Send Mail</strong>
                                <span> <a class="btn btn-success btn-sm" href="{{ url('email_view', $shipping->id) }}"><i
                                    class="fas fa-share"></i></a></span></h6>
                            </div>

                            <div class="" style="float:right">
                                <form action="{{ url('update_order_status/' . $order->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div style="display: flex; justify-content: space-between;">
                                        <select class="form-select mx-2" name="order_status" style="width: 140px">
                                            <option {{ $order->status == '0' ? 'selected' : '' }} value="0">Pending
                                            </option>
                                            <option {{ $order->status == '1' ? 'selected' : '' }} value="1">Completed
                                            </option>
                                        </select>

                                        <button type="submit" class="btn btn-success btn-sm">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>


                        <div class="card  mb-3">
                            <h5 class="card-body-title p-3" style="background: greenyellow"><strong>Order Item</strong>
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
                            <h5 class="card-body-title p-3" style="background: greenyellow"><strong>Orders</strong>
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
                                            <input class="form-control" type="text" 
                                                placeholder="Enter lastname" value="{{ $order->payment_type }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Sub Total:</label>
                                            <input class="form-control" type="text" 
                                                placeholder="Enter email address" value="{{ $order->subtotal }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Total:</label>
                                            <input class="form-control" type="text" 
                                                placeholder="Enter email address" value="{{ $order->total }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Discount: </label>

                                            @if ($order->discount_percentage == null)
                                                <span class="py-1 px-2 rounded text-white"
                                                    style="background:red;">No</span>
                                            @else
                                                <span class="py-1 px-2 rounded text-white bg-success"
                                                    >{{ $order->discount_percentage }}%</span>
                                            @endif

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="card w-100  mb-3">
                            <h5 class="card-body-title p-3" style="background: greenyellow"><strong>Shipping
                                    Address</strong></h5>
                            <div class="form-layout">
                                <div class="row  p-3">

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Name:</label>
                                            <input class="form-control" type="text"
                                                value="{{ $shipping->shipping_name }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Email address: </label>
                                            <input class="form-control" type="text" 
                                                value="{{ $shipping->shipping_email }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Shipping Phone: </label>
                                            <input class="form-control" type="text" 
                                                value="{{ $shipping->shipping_phone }}" readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Shippng Address:</label>
                                            <input class="form-control" type="text"
                                                 value="{{ $shipping->address }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">State:</label>
                                            <input class="form-control" type="text"
                                                 value="{{ $shipping->state }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Post Code: </label>
                                            <input class="form-control" type="text" 
                                               value="{{ $shipping->post_code }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-12 my-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description</label>
                                            <textarea style="color:black" rows="4" name="description"
                                                class="form-control  " readonly
                                                cols="5">{{ $shipping->description }}</textarea>
                                            
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


    <!-- Bootstrap script -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>
