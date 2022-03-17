@extends('layouts.admin_layout')

@section('title')
Admin - Product Add 
@endsection

@section('admin_content')

<div class="sl-mainpanel m-4 ">
    <nav class="breadcrumb sl-breadcrumb">
        <p>Admin Panel / Add Product</p>
    </nav>

    <div class="sl-pagebody">
        <div class="row">

            <div class="card p-4">
                <h6 class="card-body-title mb-4">Add New Products</h6>
                <form action="{{ url('admin_store_products') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-layout">

                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('success') }}</strong>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <div class="row mg-b-25">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Name: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control bg-white " style="color: black" type="text" name="product_name"
                                         placeholder="product name">
                                    @error('product_name')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Code: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control  bg-white" style="color: black" type="text" name="product_code"
                                        value="{{ old('product_code') }}" placeholder="product code">
                                    @error('product_code')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Price: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control  bg-white" style="color: black" type="text" name="price" value="{{ old('price') }}"
                                        placeholder="product price">
                                    @error('price')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Quantity: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control  bg-white" style="color: black" type="number" name="product_quantity"
                                        value="{{ old('product_quantity') }}" placeholder="product quantity">
                                    @error('product_quantity')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select2  bg-white" style="color: black" name="category_id"
                                        data-placeholder="Choose Category">
                                        <option label="Choose category"></option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach

                                    </select>
                                    @error('category_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Brand: <span
                                            class="text-danger">*</span></label>
                                    <select class="form-control select2  bg-white" style="color: black" name="brand_id"
                                        data-placeholder="Choose brand">
                                        <option label="Choose brand"></option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->brand_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Product Slug: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control bg-white " style="color: black" type="text" name="product_slug"
                                        placeholder="product slug">
                                    @error('product_slug')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->
                            
                           
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Description <span class="text-danger">*</span></label></label>
                                    <textarea style="color:black" rows="10" name="description" required class="form-control bg-white " id="exampleInputEmail1" cols="5" ></textarea>
                                    @error('description')
                                    <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div>


                            <!-- image -->
                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Main thambnail: <span
                                            class="text-danger">*</span></label>
                                            
                                            <img id="output" style="height:250px; background:greenyellow; color:black;"  alt="Image not here" >
                                    <input class="form-control" type="file" name="image_one" onchange="loadFile(event)">
                                    @error('image_one')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Image Two: <span
                                            class="text-danger">*</span></label>

                                            <img id="output2" style="height:250px; background:greenyellow; color:black;"  alt="Image not here">
                                    <input class="form-control" type="file" name="image_two" onchange="loadFile2(event)">
                                    @error('image_two')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Image Three: <span
                                            class="text-danger">*</span></label>

                                            <img id="output3" style="height:250px; background:greenyellow; color:black;"  alt="Image not here">
                                    <input class="form-control" type="file" name="image_three" onchange="loadFile3(event)">
                                    @error('image_three')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-3">
                                <div class="form-group">
                                    <label class="form-control-label">Image Four: <span class="text-danger">*</span></label>

                                    <img id="output4" style="height:250px; background:greenyellow; color:black;"  alt="Image not here">
                                    <input class="form-control" type="file" name="image_four" onchange="loadFile4(event)">
                                    @error('image_four')
                                        <strong class="text-danger">{{ $message }}</strong>
                                    @enderror
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Add Products</button>
                        </div><!-- form-layout-footer -->
                </form>
            </div><!-- form-layout -->
        </div><!-- card -->
    </div>

</div>

@endsection