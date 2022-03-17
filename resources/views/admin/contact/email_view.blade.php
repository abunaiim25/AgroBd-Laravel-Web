<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin - Send Mail</title>


    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body style="background: #1e273b">

    <div class="container">
        <div class="sl-mainpanel m-4">
            <nav class="breadcrumb sl-breadcrumb">
                <a class="breadcrumb-item  text-white" style="text-decoration: none" href="{{url('admin_contact/'.$contact->id)}}">Contact</a>
                <span class="breadcrumb-item active text-white">Send Mail</span>
            </nav>

            <div class="sl-pagebody">
                <div class="row row-sm">

                    <div class="card p-4">
                        <h3 class="card-body-title mb-3">Send Mail</h3>



                        @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif


                        <form action="{{ url('contact_send_email/'. $contact->id) }}" method="POST">
                            @csrf    

                            <div class="row">

                                <div class="col-6 my-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Greeting</label>
                                        <input type="text" style=" color:black" name="greeting"
                                            class="form-control bg-white" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" required>
                                    </div>
                                </div>

                                <div class="col-6 my-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">End Part</label>
                                        <input type="text" style=" color:black" name="endpart"
                                            class="form-control bg-white" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" required>
                                    </div>
                                </div>

                                <div class="col-12 my-1">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Body</label>
                                        <textarea style="color:black" rows="8" name="body"
                                            class="form-control bg-white" id="exampleInputEmail1" required cols="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="my-2">
                                <button type="submit" class="btn btn-outline-success" >Send Email</button>
                            </div>
                        </form>


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
