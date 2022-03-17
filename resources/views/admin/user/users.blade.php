@extends('layouts.admin_layout')

@section('title')
    Admin - Users
@endsection

@section('search')
 {{--sesrch--}}
 <ul class="navbar-nav w-100">
    <li class="nav-item w-100">

      <form  action="{{url('users_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
        {{csrf_field()}}
        <input type="text" name="search"  class="form-control bg-white" placeholder="search users">
      </form>
      
    </li>
  </ul>
@endsection

@section('admin_content')


    <div class="sl-mainpanel m-4">
        <nav class="breadcrumb sl-breadcrumb">

            <p>Admin Panel / Users</p>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-12">

                    @if (session('status'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('status') }}</strong>
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



                    <div class="card p-4" style="overflow: auto">
                        <h6 class="card-body-title mb-4">Users List</h6>
                        <div class="table-wrapper" style="overflow: auto">

                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ url('users') }}">Users</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ url('admins') }}">Admins</a>
                                </li>
                            </ul>

                            @if ($users->count() > 0)
                                <div class="product">
                                    <table width="100%" class="table display responsive nowrap text-white">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>User Type</th>
                                                <th>Create Admin</th>
                                                <th>Deleted</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php $i = $users->perPage() * ($users->currentPage() - 1); ?>

                                            @foreach ($users as $row)
                                                <tr>
                                                    <td> <?php $i++; ?> {{ $i }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->email }}</td>
                                                    <td>{{ $row->phone }}</td>{{-- $row->category_id --}}
                                                    <td>{{ $row->address }}</td>
                                                    <td>
                                                        @if ($row->usertype == 1)
                                                            <span class="badge badge-success">Admin</span>
                                                        @else
                                                            <span class="badge badge-success">User</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <a href="{{ url('usertype_edit/' . $row->id) }}"
                                                            class="btn btn-sm btn-success"><i
                                                                class="fa fa-pencil"></i></a>
                                                    </td>

                                                    <td>
                                                        <a href="{{ url('usertype_delete/' . $row->id) }}"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are You Sure To Delete?')"><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h2 class="text-center p-5">Users Not Available</h2>
                            @endif
                        </div><!-- table-wrapper -->
                    </div><!-- card -->



                </div>

            </div>

        </div>


        <div class="d-flex mt-5">
            {{-- (paginate) ->Providers\AppServiceProvider.php --}}
            {{ $users->links() }}
            {{-- {{$appoint->onEachSide(1)-> links()}} --}}
        </div>
    </div>

@endsection
