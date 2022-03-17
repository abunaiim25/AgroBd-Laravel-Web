<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Product Edit</title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="background: #1e273b">

    <div class="container">
        <div class="sl-mainpanel m-4">
            <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item  text-white" style="text-decoration: none"
                    href="{{ url('admin_products_manage') }}">Manage Product</a>
                <span class="breadcrumb-item active text-white">Product Edit</span>
            </nav>

            <div class="sl-pagebody">
                <div class="row row-sm">

                    <div class="card p-4">
                        <h3 class="card-body-title mb-3">Product Edit</h3>


                        <form action="{{ url('admin_update_products', $product->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf


                            <div class="form-layout">

                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <div class="row mg-b-25">
                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Name: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="product_name"
                                                value="{{ $product->product_name }}" placeholder="product name">
                                            @error('product_name')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div><!-- col-4 -->

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Product Code: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="product_code"
                                                value="{{ $product->product_code }}" placeholder="product code">
                                            @error('product_code')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div><!-- col-4 -->

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Price: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="text" name="price"
                                                value="{{ $product->price }}" placeholder="product price">
                                            @error('price')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div><!-- col-4 -->

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">Quantity: <span
                                                    class="text-danger">*</span></label>
                                            <input class="form-control" type="number" name="product_quantity"
                                                value="{{ $product->product_quantity }}"
                                                placeholder="product quantity">
                                            @error('product_quantity')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div><!-- col-4 -->

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Category: <span
                                                    class="text-danger">*</span></label>
                                            <select class="form-control select2" name="category_id"
                                                data-placeholder="Choose country">
                                                <option label="Choose category"></option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}"
                                                        {{ $category->id == $product->category_id ? 'selected' : '' }}>
                                                        {{ $category->category_name }}</option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div><!-- col-4 -->

                                    <div class="col-lg-4 my-1">
                                        <div class="form-group mg-b-10-force">
                                            <label class="form-control-label">Brand: <span
                                                    class="tx-danger">*</span></label>
                                            <select class="form-control select2" name="brand_id"
                                                data-placeholder="Choose country">
                                                <option label="Choose brand"></option>
                                                @foreach ($brands as $brand)
                                                    <option value="{{ $brand->id }}"
                                                        {{ $brand->id == $product->brand_id ? 'selected' : '' }}>
                                                        {{ $brand->brand_name }}</option>
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
                                            <input class="form-control bg-white " style="color: black" type="text"
                                                name="product_slug" value="{{ $product->product_slug }}"
                                                placeholder="product slug">
                                            @error('product_slug')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div><!-- col-4 -->

                                    <div class="col-12 my-1">
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Description <span
                                                    class="text-danger">*</span></label></label>
                                            <textarea style="color:black" rows="10" name="description" required
                                                class="form-control bg-white " id="exampleInputEmail1"
                                                cols="5">{{ $product->description }}</textarea>
                                            @error('description')
                                                <strong class="text-danger">{{ $message }}</strong>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="row row-sm mt-5">

                                        <div class="col-lg-3 my-2">
                                            <div class="form-group">
                                                <label class="form-control-label">Main thambnail: <span
                                                        class="text-danger">*</span></label>
                                                <img src="{{ asset('img_DB/product/image_one/' . $product->image_one) }}"
                                                    alt="" height="120px;" width="120px;">
                                            </div>
                                            <div class="form-group my-1">
                                                <input class="form-control" type="file" name="image_one">
                                                @error('image_one')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-3 my-2">
                                            <div class="form-group">
                                                <label class="form-control-label">Image Two: <span
                                                        class="text-danger">*</span></label>
                                                <img src="{{ asset('img_DB/product/image_two/' . $product->image_two) }}"
                                                    alt="" height="120px;" width="120px;">
                                            </div>
                                            <div class="form-group my-1">
                                                <input class="form-control" type="file" name="image_two">
                                                @error('image_two')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>

                                        </div>

                                        <div class="col-lg-3 my-2">
                                            <div class="form-group">
                                                <label class="form-control-label">Image Three: <span
                                                        class="text-danger">*</span></label>
                                                <img src="{{ asset('img_DB/product/image_three/' . $product->image_three) }}"
                                                    alt="" height="120px;" width="120px;">
                                            </div>
                                            <div class="form-group my-1">
                                                <input class="form-control" type="file" name="image_three">
                                                @error('image_three')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-3 my-2">
                                            <div class="form-group">
                                                <label class="form-control-label">Image Four: <span
                                                        class="text-danger">*</span></label>
                                                <img src="{{ asset('img_DB/product/image_four/' . $product->image_four) }}"
                                                    alt="" height="120px;" width="120px;">
                                            </div>
                                            <div class="form-group my-1">
                                                <input class="form-control" type="file" name="image_four">
                                                @error('image_four')
                                                    <strong class="text-danger">{{ $message }}</strong>
                                                @enderror
                                            </div>
                                        </div>


                                    </div>


                                </div><!-- row -->

                                <button class="btn btn-primary mg-r-5 mt-3" type="submit">Update Data</button>

                        </form>
                    </div><!-- form-layout -->
                </div><!-- card -->
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
