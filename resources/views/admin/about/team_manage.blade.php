@extends('layouts.admin_layout')

@section('title')
    Admin - Our Team Manage
@endsection


@section('search')
 {{--sesrch--}}
 <ul class="navbar-nav w-100">
    <li class="nav-item w-100">

      <form  action="{{url('team_person_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
        {{csrf_field()}}
        <input type="text" name="search"  class="form-control bg-white" placeholder="search team persons">
      </form>
      
    </li>
  </ul>
@endsection


@section('admin_content')
    <div class="sl-mainpanel m-4">
        <nav class="breadcrumb sl-breadcrumb">
            <p>Admin Panel / Manage Our Team</p>
        </nav>

        <div class="sl-pagebody">
            <div class="row row-sm">
                <div class="col-md-12">

                    @if (session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>{{ session('success') }}</strong>
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

                    <div class="card p-4" style="overflow: auto">
                        <h6 class="card-body-title">Our Team List</h6>
                        <div class="table-wrapper" style="overflow: auto">


                            @if ($team->count() > 0)
                                <div class="product">
                                    <table width="100%" class="table display responsive nowrap text-white">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Our Team Image Here</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Designation</th>
                                                <th>Some Text</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php $i = $team->perPage() * ($team->currentPage() - 1); ?>

                                            @foreach ($team as $row)
                                                <tr>
                                                    <td> <?php $i++; ?> {{ $i }}</td>
                                                    <td>
                                                        <img class="img-fluid" style="width: 150px; height:150px;"
                                                            src="{{ asset('img_DB/team_img/' . $row->team_img) }}"
                                                            alt="">
                                                    </td>
                                                    <td>{{ $row->team_name }}</td>
                                                    <td>{{ $row->team_email }}</td>
                                                    <td>{{ $row->team_designation}}</td>
                                                    <td>{{ Str::limit(strip_tags($row->team_txt), 30) }}</td>
                                                    
                                                    <td>
                                                        <a href="{{ url('admin_team_edit/' . $row->id) }}"
                                                            class="btn btn-sm btn-success">
                                                            <i class="fa fa-pencil"></i></a>

                                                        <a href="{{ url('admin_team_delete/' . $row->id) }}"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are You Sure To Delete?')">
                                                            <i class="fa fa-trash"></i></a>

                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h2 class="text-center p-5">Team Not Available</h2>
                            @endif
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>

            </div>

        </div>


        <div class="d-flex mt-5">
            {{-- (paginate) ->Providers\AppServiceProvider.php --}}
            {{ $team->links() }}
            {{-- {{$appoint->onEachSide(1)-> links()}} --}}
        </div>
    </div>

@endsection
