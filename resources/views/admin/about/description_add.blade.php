@extends('layouts.admin_layout')

@section('title')
    Admin - Product Add
@endsection

@section('admin_content')
    <nav class="breadcrumb sl-breadcrumb mt-3">
        <p>Admin Panel / Add About Description</p>
    </nav>

    <div class="card mx-3 p-5">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 ">

                
                <form action="{{ url('admin_about_store_description') }}" method="POST">
                    @csrf

                    <div style="display: flex; justify-content: space-between;" class="mb-2">
                        <h6 class="card-body-title mb-4">Add About Description</h6>
                        <button class="btn btn-info mg-r-5">Update</button>
                    </div>

                    <div class="form-group">

                        <textarea style="color:black" rows="15" name="about_description" required class="form-control bg-white "
                            id="exampleInputEmail1" cols="5">{{ $about->about_description }}</textarea>
                        @error('about_description')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                    <div class="form-group mt-5">
                        <label for="" class="mb-3">Read Less</label>
                        <textarea style="color:black" rows="15" name="about_description_readmore" required class="form-control bg-white "
                            id="exampleInputEmail1" cols="5">{{ $about->about_description_readmore }}</textarea>
                        @error('about_description_readmore')
                            <strong class="text-danger">{{ $message }}</strong>
                        @enderror
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection
