@extends('layouts.admin_layout')

@section('title')
Admin - News Add 
@endsection

@section('admin_content')

<div class="sl-mainpanel m-4 ">
    <nav class="breadcrumb sl-breadcrumb">
        <p>Admin Panel / Add News</p>
    </nav>

    <div class="sl-pagebody">
        <div class="row">

            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('status'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('status') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('status_inactive'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('status_inactive') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        @if (session('delete'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>{{ session('delete') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

            <div class="card p-4">
                <h6 class="card-body-title mb-4">Add News</h6>

                <form action="{{ url('admin_store_news') }}" method="POST" enctype="multipart/form-data">
                    @csrf
        
                    <div class="row">
        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">News Title<span class="text-danger">*</span></label>
                                <input type="text" style=" color:black" name="title" required class="form-control bg-white"  id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">News Category/Type<span class="text-danger">*</span></label>
                                <input type="text" style=" color:black" name="category" required class="form-control bg-white"  id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Place<span class="text-danger">*</span></label>
                                <input type="text" style=" color:black" name="place" required class="form-control bg-white"  id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">News Writer Name<span class="text-danger">*</span></label>
                                <input type="text" style=" color:black" name="writer_name" required class="form-control bg-white"  id="exampleInputEmail1" aria-describedby="emailHelp">
                            </div>
                        </div>
        
                        <div class="col-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">News Description<span class="text-danger">*</span></label>
                                <textarea style="color:black" rows="10" name="description" required class="form-control bg-white " id="exampleInputEmail1" cols="5" ></textarea>
                            </div>
                        </div>
        
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">News Image<span class="text-danger">*</span></label>

                                <img id="output" style="height:250px; background:greenyellow; color:black;"  alt="Image not here" >
                                <input type="file" name="image" class="form-control" required  id="exampleInputEmail1" aria-describedby="emailHelp" onchange="loadFile(event)">
                            </div>
                        </div>
        
                      
        
                    </div>
                    
                        <button style="width: 150px" type="submit" class="btn btn-outline-success">Submit</button>
                   
                </form>
            </div><!-- form-layout -->
        </div><!-- card -->
    </div>

</div>

@endsection