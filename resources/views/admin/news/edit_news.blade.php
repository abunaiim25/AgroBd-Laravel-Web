<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - News Edit</title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="background: #1e273b">

    <div class="container">
        <div class="sl-mainpanel m-4">
            <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item  text-white" style="text-decoration: none"
                    href="{{ url('admin_products_manage') }}">Manage News</a>
                <span class="breadcrumb-item active text-white">News Edit</span>
            </nav>

            <div class="sl-pagebody">
                <div class="row row-sm">

                    <div class="card p-4">
                        <h3 class="card-body-title mb-3">News Edit</h3>


                        <form action="{{ url('news_edit_update/'.$news->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">News Title</label>
                                        <input type="text" style=" color:black" name="title" 
                                            class="form-control bg-white" value="{{ $news->title }}"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">News Category/Type</label>
                                        <input type="text" style=" color:black" name="category" 
                                            class="form-control bg-white" value="{{ $news->category }}"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Place</label>
                                        <input type="text" style=" color:black" name="place" 
                                            class="form-control bg-white" value="{{ $news->place }}"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">News Writer Name</label>
                                        <input type="text" style=" color:black" name="writer_name" 
                                            class="form-control bg-white" value="{{ $news->writer_name }}"
                                            id="exampleInputEmail1" aria-describedby="emailHelp">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">News Description</label>
                                        <textarea style="color:black" rows="10" name="description" 
                                            class="form-control bg-white " id="exampleInputEmail1"
                                            cols="5">{{ $news->description }}</textarea>
                                    </div>
                                </div>

                                <div class="col-6 mt-2">
                                    <div class="form-group">
                                        <p>
                                            <label for="exampleInputEmail1">News Image</label>
                                        </p>
                                        <img src="{{ asset('img_DB/news/' . $news->image) }}" alt="" height="150px;"
                                            width="250px;">

                                        <p>
                                            <input class="mt-1" type="file" name="image"
                                                class="form-control"  id="exampleInputEmail1"
                                                aria-describedby="emailHelp">
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <button style="width: 150px" type="submit" class="btn btn-outline-success">Submit</button>

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
