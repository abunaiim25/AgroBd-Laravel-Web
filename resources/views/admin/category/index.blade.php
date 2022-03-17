@extends('layouts.admin_layout')


@section('title')
    Admin - Category
@endsection

@section('search')
 {{--sesrch--}}
 <ul class="navbar-nav w-100">
    <li class="nav-item w-100">

      <form  action="{{url('category_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
        {{csrf_field()}}
        <input type="text" name="search"  class="form-control bg-white" placeholder="search categories">
      </form>
      
    </li>
  </ul>
@endsection

@section('admin_content')

    <div class="sl-mainpanel m-3">
        <nav class="breadcrumb sl-breadcrumb">
            <p>Admin Panel / Category </p>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-8  mt-2">
                    <div class="card p-3">
                        <h6 class="card-body-title"> Category List</h6>

                        {{-- category updated message --}}
                        @if (session('Catupdated'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>{{ session('Catupdated') }}</strong>
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

                        <div class="table-wrapper"  style="overflow: auto">

                            @if ($categories->count() > 0)

                            <table id="datatable1" class="table  text-white">
                                <thead>
                                    <tr>
                                        <th class="wd-15p">Sl</th>
                                        <th class="wd-15p">Category Name</th>
                                        <th class="wd-20p">Status</th>
                                        <th class="wd-25p">Action</th>
                                    </tr>
                                </thead>
                                <tbody>


                                    <?php $i = $categories->perPage()*($categories->currentPage()-1) ?>

                                    @foreach ($categories as $category)
                                        <tr>
                                            <td> <?php $i++ ?> {{ $i }}</td>
                                            <td>{{ $category->category_name }}</td>
                                            <td>
                                                @if ($category->status == 1)
                                                    <span class="badge badge-success">Active</span>
                                                @else
                                                    <span class="badge badge-danger">Inactive</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ url('admin_categories_edit/' . $category->id) }}"
                                                    class="btn btn-sm btn-success"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ url('admin_categories_delete/' . $category->id) }}"
                                                    class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure To Delete?')"><i class="fa fa-trash"></i></a>

                                                @if ($category->status == 1)
                                                    <a href="{{ url('admin_categories_inactive/' . $category->id) }}"
                                                        class="btn btn-sm btn-danger"><i class="fa fa-arrow-down"></i></a>
                                                @else
                                                    <a href="{{ url('admin_categories_active/' . $category->id) }}"
                                                        class="btn btn-sm btn-success"><i class="fa fa-arrow-up"></i></a>
                                                @endif

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            @else
                            <h2 class="text-center p-5">Categories Not Available</h2>
                            @endif
                            
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>

                <div class="col-md-4  mt-2">
                    <div class="card">
                        <div class="card-header">Add Category
                        </div>

                        <div class="card-body">

                            @if (session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <strong>{{ session('success') }}</strong>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ url('admin_store_category') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Add Category</label>
                                    <input style="color: black" type="text" name="category_name"
                                        class="form-control bg-white
                           @error('category_name') is-invalid @enderror"
                                        id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Category">

                                    @error('category_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                                <button type="submit" class="btn btn-primary">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>


        <div class="d-flex my-5">
            {{--(paginate) ->Providers\AppServiceProvider.php --}}
            {{$categories->links()}}
       {{--
            {{$appoint->onEachSide(1)-> links()}}
       --}}
       </div>

    @endsection
