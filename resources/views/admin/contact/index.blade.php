@extends('layouts.admin_layout')

@section('title')
    Admin - Brand
@endsection

@section('search')
 {{--sesrch--}}
 <ul class="navbar-nav w-100">
    <li class="nav-item w-100">

      <form  action="{{url('contact_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
        {{csrf_field()}}
        <input type="text" name="search"  class="form-control bg-white" placeholder="search contact">
      </form>
      
    </li>
  </ul>
@endsection

@section('admin_content')

    <div class="sl-mainpanel m-3">
        <nav class="breadcrumb sl-breadcrumb">
            <p>Admin Panel / Contact </p>
        </nav>

        <div class="sl-pagebody ">

            <div class="card p-3">
                <h6 class="card-body-title">Contact list</h6>

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


                <div class="table-wrapper " style="overflow: auto">
                    @if ($contact->count() > 0)
                        <table id="datatable1" class="table display responsive nowrap text-white">
                            <thead>
                                <tr>
                                    <th>Customer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Message</th>
                                    <th>Seen</th>
                                    <th>Send Mail</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $i = $contact->perPage() * ($contact->currentPage() - 1); ?>

                                @foreach ($contact as $item)
                                    <tr>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->date }}</td>
                                        <td><span class="badge badge-info">{{ $item->status }}</span></td>

                                        <td>{{ Str::limit(strip_tags($item->message), 20) }} <a class="btn btn-warning"
                                                href="{{ url('message_seen', $item->id) }}"><i
                                                    class="fas fa-eye"></i></a></td>

                                        <td><a class="btn btn-info btn-sm"
                                                href="{{ url('contact_seen_admin', $item->id) }}"><i
                                                    class="fas fa-thumbs-up"></i> </a></td>
                                                    
                                        <td><a class="btn btn-primary btn-sm" href="{{ url('contact_email_view', $item->id) }}"><i
                                                    class="fas fa-share"></i></a></td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                    @else
                        <h2 class="text-center p-5">Contacts Not Available</h2>
                    @endif

                </div><!-- table-wrapper -->

            </div>


            <div class="d-flex ">
                {{-- (paginate) ->Providers\AppServiceProvider.php --}}
                {{ $contact->links() }}
                {{-- {{$appoint->onEachSide(1)-> links()}} --}}
            </div>
        </div>


    @endsection
