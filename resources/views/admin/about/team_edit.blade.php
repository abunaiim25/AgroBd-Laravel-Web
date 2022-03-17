<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Our Team Edit</title>


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
                <span class="breadcrumb-item active text-white">Our Team Edit</span>
            </nav>

            <div class="sl-pagebody">
                <div class="row row-sm">

                    <div class="card p-4">
                        <h3 class="card-body-title mb-3">Our Team Edit</h3>


                        <form action="{{ url('admin_team_update/'.$team->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <div class="row ">

                                <div class="col-lg-4 my-1">
                                    <div class="form-group">
                                        <label class="form-control-label">Name: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control bg-white " style="color: black" type="text"
                                            name="team_name" placeholder="name" value="{{ $team->team_name }}" >

                                    </div>
                                </div><!-- col-4 -->


                                <div class="col-lg-4 my-1">
                                    <div class="form-group">
                                        <label class="form-control-label">Designation: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control  bg-white" style="color: black" type="text"
                                            name="team_designation" placeholder="designation"
                                            value="{{ $team->team_designation }}" >

                                    </div>
                                </div><!-- col-4 -->


                                <div class="col-lg-4 my-1">
                                    <div class="form-group">
                                        <label class="form-control-label">Email: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control bg-white " style="color: black" type="text"
                                            name="team_email" placeholder="email" value="{{ $team->team_email }}"
                                            >

                                    </div>
                                </div><!-- col-4 -->

                                <div class="col-lg-12 my-1">
                                    <div class="form-group">
                                        <label class="form-control-label">Some Text: <span
                                                class="text-danger">*</span></label>
                                        <input class="form-control bg-white" maxlength="100" style="color: black"
                                            type="text" name="team_txt"
                                            placeholder="some text (character not more than 100)"
                                            value="{{ $team->team_txt }}" >

                                    </div>
                                </div><!-- col-4 -->


                                <!-- image -->
                                <div class="col-lg-3 my-1">
                                    <div class="form-group">
                                        <label class="form-control-label">Image: <span
                                                class="text-danger">*</span></label>

                                        <img class="img-fluid my-1" style="width: 150px; height:150px;"
                                            src="{{ asset('img_DB/team_img/' . $team->team_img) }}" alt="">
                                        <input class="form-control" type="file" name="team_img" >

                                    </div>
                                </div><!-- col-4 -->

                            </div><!-- row -->

                            <div class="form-layout-footer my-1">
                                <button class="btn btn-info mg-r-5">Update Team Member</button>
                            </div><!-- form-layout-footer -->
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
