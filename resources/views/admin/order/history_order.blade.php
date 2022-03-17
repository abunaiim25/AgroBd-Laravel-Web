@extends('layouts.admin_layout')

@section('title')
    Admin - Order History
@endsection


@section('search')
 {{--sesrch--}}
 <ul class="navbar-nav w-100">
    <li class="nav-item w-100">

      <form  action="{{url('orders_history_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
        {{csrf_field()}}
        <input type="text" name="search"  class="form-control bg-white" placeholder="search order history">
      </form>
      
    </li>
  </ul>
@endsection


@section('admin_content')

    <div class="sl-mainpanel m-4">
        <nav class="breadcrumb sl-breadcrumb">
            <p>Admin Panel / Order History</p>
           
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

                        
                        <div class="mb-3" style="display: flex; justify-content: space-between;">
                            <div>
                                <h6 class="card-body-title">Order History List</h6>
                            </div>
                            <div>
                                <a href="{{ '/home' }}" class="btn btn-success">Order</a>
                            </div>
                        </div>
                      
                        <div class="table-wrapper" style="overflow: auto">

                            <ul class="nav nav-pills">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="{{ url('/home') }}">Hand Cash</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link " href="{{ url('admin_payment_online') }}">Payment Online</a>
                                </li>
                            </ul>

                            @if ($orders->count() > 0)
                                <div class="product">
                                    <table width="100%" class="table display responsive nowrap text-white">
                                        <thead>
                                            <tr>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Odrer Time</th>
                                                <th>Odrer Date</th>
                                                <th>Email</th>
                                                <th>Invoice No</th>
                                                <th>Payment Type</th>
                                                <th>Total</th>
                                                <th>Discount</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php $i = $orders->perPage() * ($orders->currentPage() - 1); ?>

                                            @foreach ($orders as $row)
                                                <tr>
                                                    <td><?php $i++; ?> {{ $i }}</td>
                                                    <td>{{ $row->created_at->diffForHumans() }}</td>
                                                    <td>{{ date('d-m-Y', strtotime($row->created_at)) }}</td>
                                                    <td>{{$row->user->email}}</td>
                                                    <td>{{ $row->invoice_no }}</td>
                                                    <td>{{ $row->payment_type }}</td>
                                                    <td>{{ $row->total }} TK</td>
                                                    <td>
                                                        @if ($row->discount_percentage == null)
                                                            <span class="badge badge-danger">No</span>
                                                        @else
                                                            <span class="badge badge-success">Yes</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $row->status == '0' ? 'Pending' : 'Completed' }}</td>
                                                    <td>
                                                        <a href="{{ url('admin_orders_view/' . $row->id) }}"
                                                            class="btn btn-sm btn-success"><i
                                                                class="fa fa-eye"></i></a>
                                                        <a href="{{ url('admin_orders_delete/' . $row->id) }}"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are you shure to delete?')"><i
                                                                class="fa fa-trash"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h2 class="text-center p-5">Orders Not Available</h2>
                            @endif
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>

            </div>

        </div>


        <div class="d-flex mt-5">
            {{-- (paginate) ->Providers\AppServiceProvider.php --}}
            {{ $orders->links() }}
            {{-- {{$appoint->onEachSide(1)-> links()}} --}}
        </div>
    </div>

@endsection
