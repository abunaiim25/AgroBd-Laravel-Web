@extends('layouts.admin_layout')

@section('title')
Admin - Add Team Member
@endsection

@section('admin_content')

<div class="sl-mainpanel m-4 ">
    <nav class="breadcrumb sl-breadcrumb">
        <p>Admin Panel / Add Team Member</p>
    </nav>

    <div class="sl-pagebody">
        <div class="row">

            <div class="card p-4">
                <h6 class="card-body-title mb-4">Add Team Member</h6>
                <form action="{{ url('admin_team_store') }}" method="POST" enctype="multipart/form-data">
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

                        <div class="row ">

                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Name: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control bg-white " style="color: black" type="text" name="team_name"
                                         placeholder="name" required>
                                   
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Designation: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control  bg-white" style="color: black" type="text" name="team_designation" 
                                        placeholder="designation" required>
                                  
                                </div>
                            </div><!-- col-4 -->


                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Email: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control bg-white " style="color: black" type="text" name="team_email"
                                        placeholder="email" required>
                                   
                                </div>
                            </div><!-- col-4 -->
                            
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Some Text: <span
                                            class="text-danger">*</span></label>
                                    <input class="form-control bg-white" maxlength="100" style="color: black" type="text" name="team_txt"
                                        placeholder="some text (character not more than 100)" required>
                                  
                                </div>
                            </div><!-- col-4 -->


                            <!-- image -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Image: <span
                                            class="text-danger">*</span></label>

                                  <img id="output" style="height:250px; background:greenyellow; color:black;"  alt="Image not here" >
                                    <input class="form-control" type="file" name="team_img" onchange="loadFile(event)" required>
                                    
                                </div>
                            </div><!-- col-4 -->

                        </div><!-- row -->

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Add Team Member</button>
                        </div><!-- form-layout-footer -->
                </form>
            </div><!-- form-layout -->
        </div><!-- card -->
    </div>

</div>

@endsection