<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Discount Edit</title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="background: #1e273b">

    <div class="container">
        <div class="sl-mainpanel pt-5">

            <div class="sl-pagebody">

                <div class="row row-sm">
                    <div class="col-md-8 m-auto">
                        <nav class="breadcrumb sl-breadcrumb">
                            <a class="breadcrumb-item  text-white" style="text-decoration: none"
                                href="{{ url('admin_discount') }}">Brand</a>
                            <span class="breadcrumb-item active text-white">Discount Edit</span>
                        </nav>
                        <div class="card">
                            <div class="card-header h3"><b> Edit Discount</b>
                            </div>

                            <div class="card-body">
                                @if (session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong>{{ session('success') }}</strong>
                                        <button type="button" class="close" data-dismiss="alert"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif

                                <form action="{{ url('admin_update_discount/'.$discount->id) }}" method="POST">
                                    @csrf
                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-3">Discount Name</label>
                                        <input type="text" name="discount_name"
                                            class="form-control @error('discount_name') is-invalid @enderror"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            value="{{ $discount->discount_name }}">

                                        @error('discount_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1" class="mb-3">Discount Percentage</label>
                                        <input type="text" name="discount_persent"
                                            class="form-control @error('discount_persent') is-invalid @enderror"
                                            id="exampleInputEmail1" aria-describedby="emailHelp"
                                            value="{{ $discount->discount_persent }}">

                                        @error('discount_persent')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <button type="submit" class="btn btn-primary mt-3">Update Discount</button>
                                </form>




                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>

</body>

</html>
