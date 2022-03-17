@extends('layouts.admin_layout')

@section('title')
    Admin - News Manage
@endsection

@section('search')
 {{--sesrch--}}
 <ul class="navbar-nav w-100">
    <li class="nav-item w-100">

      <form  action="{{url('news_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
        {{csrf_field()}}
        <input type="text" name="search"  class="form-control bg-white" placeholder="news contact">
      </form>
      
    </li>
  </ul>
@endsection

@section('admin_content')

    <div class="sl-mainpanel m-4">
        <nav class="breadcrumb sl-breadcrumb">
            <p>Admin Panel / Manage News</p>
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

                    <div class="card p-4" style="overflow: auto">
                        <h6 class="card-body-title">News List</h6>
                        <div class="table-wrapper" style="overflow: auto">


                            @if ($news->count() > 0)
                                <div class="product">
                                    <table width="100%" class="table display responsive nowrap text-white">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Time</th>
                                                <th>News Image</th>
                                                <th>New Title</th>
                                                <th>News Category</th>
                                                <th>News Place</th>
                                                <th>News Description</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php $i = $news->perPage() * ($news->currentPage() - 1); ?>

                                            @foreach ($news as $item)
                                                <tr>
                                                    <td><?php $i++; ?> {{ $i }}</td>
                                                    <td>{{ $item->created_at->diffForHumans() }}</td>
                                                    <td> <img src="{{ asset('img_DB/news/' . $item->image) }}" alt=""
                                                            height="120px;" width="120px;">
                                                    </td>
                                                    <td>{{ Str::limit(strip_tags($item->title), 25) }}</td>
                                                    <td>{{ $item->category }}</td>
                                                    <td>{{ $item->place }}</td>
                                                    <td>{{ Str::limit(strip_tags($item->description), 20) }}</td>

                                                    <td><a class="btn btn-primary btn-sm"
                                                            href="{{ url('edit_news', $item->id) }}"><i
                                                                class="fas fa-pencil"></i></a>

                                                        <a class="btn btn-danger btn-sm"
                                                            onclick="return confirm('Are you sure to remove this?')"
                                                            href="{{ url('delete_news', $item->id) }}"><i
                                                                class="fa fa-trash"></i> </a>
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h2 class="text-center p-5">News Not Available</h2>
                            @endif
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>

            </div>

        </div>


        <div class="d-flex mt-5">
            {{-- (paginate) ->Providers\AppServiceProvider.php --}}
            {{ $news->links() }}
            {{-- {{$appoint->onEachSide(1)-> links()}} --}}
        </div>
    </div>

@endsection
