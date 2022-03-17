<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - User Edit</title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="background: #1e273b">

    <div class="container">
        <div class="sl-mainpanel m-4">
            <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item  text-white" style="text-decoration: none"
                    href="{{ url('users') }}">Users</a>
                <span class="breadcrumb-item active text-white">User Type Edit</span>
            </nav>

            <div class="sl-pagebody">
                <div class="row row-sm">

                    <div class="card p-4">
                        <h3 class="card-body-title mb-3">User Type Edit</h3>


                        <form action="{{ url('admin_update_user', $usertype->id) }}" method="POST"
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


                                <div class="row">

                                    <div class="col-lg-6 my-1">
                                        <div class="form-group">
                                            <label class="form-control-label">User Type <small> (Normal User is 0 && Admin is 1)</small> :</label>
                                            <input class="form-control" type="text" name="usertype"
                                                value="{{ $usertype->usertype }}">
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
