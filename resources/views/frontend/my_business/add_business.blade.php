@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Add Product Business
@endsection


@section('frontend_content')
    <section id="cart-home " class="mt-5  pt-5 container">
        <h2 class="font-weight-bold "> Add Product Business</h2>
        <hr>
    </section>

    <section class="Business mb-5">
        <div class="container">

                <form action="{{ url('add_business_store') }}" method="POST"  enctype="multipart/form-data">
                    @csrf

                    <div class="row">

                        <div class="col-lg-12 col-md-12 col-12 mt-4">

                            <div class="card p-3" style="background:#bada7f">
                                <div class="row">

                                    <h3 class="my-3"><strong>Add My Business</strong> </h3>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Name: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="product_name" placeholder="product name" required>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Category: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="category" placeholder="product category" required>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Quantity:<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="product_quantity" placeholder="product quantity" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Price: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="price" placeholder="price" required>
                                        </div>
                                    </div>


                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Product Description</label>
                                            <textarea style="color:black" rows="3" name="product_description" class="form-control bg-white " id="exampleInputEmail1"
                                                cols="5" required></textarea>
                                        </div>
                                    </div>


                                    <div class="col-lg-3 col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Main thambnail: <span
                                                    class="text-danger">*</span></label>

                                            <img id="output" style="height:250px; background:#81B622;; color:black;"
                                                alt="Image not here">
                                            <input class="form-control mt-1" required type="file" name="image_one"
                                                onchange="loadFile(event)">
                                        </div>
                                    </div>

                                    <div class="col-lg-3  col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Image Two: <span
                                                    class="text-danger">*</span></label>

                                            <img id="output2" style="height:250px; background:#81B622;; color:black;"
                                                alt="Image not here">
                                            <input class="form-control mt-1" required type="file" name="image_two"
                                                onchange="loadFile2(event)">
                                        </div>
                                    </div>

                                    <div class="col-lg-3  col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Image Three: <span
                                                    class="text-danger">*</span></label>

                                            <img id="output3" style="height:250px; background:#81B622;; color:black;"
                                                alt="Image not here">
                                            <input class="form-control mt-1" required type="file" name="image_three"
                                                onchange="loadFile3(event)">
                                        </div>
                                    </div>

                                    <div class="col-lg-3  col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Image Four: <span
                                                    class="text-danger">*</span></label>

                                            <img id="output4" style="height:250px; background:#81B622; color:black;"
                                                alt="Image not here">
                                            <input class="form-control mt-1" required type="file" name="image_four"
                                                onchange="loadFile4(event)">
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <div class="col-lg-12 col-md-12 col-12 mt-4">
                            <div class="card p-3" style="background:#bada7f">
                                <div class="row">

                                    <h3 class="my-3"><strong>Address Of The Selling Place</strong> </h3>

                                    <input type="hidden" name="User_id" value="{{ Auth::user()->id }}">

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Name: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="name" placeholder="name" value="{{ Auth::user()->name }}" readonly>

                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Email: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="email" placeholder="email" value="{{ Auth::user()->email }}"
                                                readonly>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Phone:<span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="phone" placeholder="phone" value="{{ Auth::user()->phone }}"
                                                required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Village/House: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="village" placeholder="village/house" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Road/Block/Sector: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="road" placeholder="road/block/sector" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Police Station: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="police_station" placeholder="police station" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Post Office: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="post_office" placeholder="post office" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">District: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="district" placeholder="district" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Post Code: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="post_code" placeholder="post code (integer type)" required>
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Country: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="country" placeholder="country" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Something write about your address if any
                                                (optional):</label>
                                            <textarea style="color:black" rows="3" name="personal_description" class="form-control bg-white "
                                                id="exampleInputEmail1" cols="5"></textarea>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>


                    <button class="buy-btn button-style ml-2 mt-2">Submit</button>
                </form>
          
        </div>
    </section>
    <!-- Checkout Section End -->
@endsection
