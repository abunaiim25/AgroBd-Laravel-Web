@extends('layouts.admin_layout')

@section('title')
    Admin - Product Manage
@endsection

@section('search')
 {{--sesrch--}}
 <ul class="navbar-nav w-100">
    <li class="nav-item w-100">

      <form  action="{{url('product_search')}}" method="GET" class="nav-link mt-2 mt-md-0  d-lg-flex search">
        {{csrf_field()}}
        <input type="text" name="search"  class="form-control bg-white" placeholder="search product">
      </form>
      
    </li>
  </ul>
@endsection


@section('admin_content')

    <div class="sl-mainpanel m-4">
        <nav class="breadcrumb sl-breadcrumb">
            <p>Admin Panel / Manage Product</p>
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
                        <h6 class="card-body-title">Products List</h6>
                        <div class="table-wrapper" style="overflow: auto">


                            @if ($products->count() > 0)
                                <div class="product">
                                    <table width="100%" class="table display responsive nowrap text-white">
                                        <thead>
                                            <tr>
                                                <th>Sl</th>
                                                <th>Product Image Here</th>
                                                <th>Product Name</th>
                                                <th>Product Quantity</th>
                                                <th>Category</th>
                                                <th>Price</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>

                                        <tbody>

                                            <?php $i = $products->perPage() * ($products->currentPage() - 1); ?>

                                            @foreach ($products as $row)
                                                <tr>
                                                    <td> <?php $i++; ?> {{ $i }}</td>
                                                    <td>
                                                        <img class="img-fluid" style="width: 150px; height:150px;"
                                                            src="{{ asset('img_DB/product/image_one/' . $row->image_one) }}"
                                                            alt="">
                                                    </td>
                                                    <td>{{ $row->product_name }}</td>
                                                    <td>{{ $row->product_quantity }}</td>
                                                    <td>{{ $row->category->category_name }}</td>{{-- $row->category_id --}}
                                                    <td>{{ $row->price }}</td>
                                                    <td>
                                                        @if ($row->status == 1)
                                                            <span class="badge badge-success">Active</span>
                                                        @else
                                                            <span class="badge badge-danger">Inactive</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('admin_products_edit/' . $row->id) }}"
                                                            class="btn btn-sm btn-success"><i
                                                                class="fa fa-pencil"></i></a>

                                                        <a href="{{ url('admin_products_delete/' . $row->id) }}"
                                                            class="btn btn-sm btn-danger"
                                                            onclick="return confirm('Are You Sure To Delete?')"><i
                                                                class="fa fa-trash"></i></a>

                                                        @if ($row->status == 1)
                                                            <a href="{{ url('admin_products_inactive/' . $row->id) }}"
                                                                class="btn btn-sm btn-danger"><i
                                                                    class="fa fa-arrow-down"></i></a>
                                                        @else
                                                            <a href="{{ url('admin_products_active/' . $row->id) }}"
                                                                class="btn btn-sm btn-success"><i
                                                                    class="fa fa-arrow-up"></i></a>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach

                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <h2 class="text-center p-5">Product Not Available</h2>
                            @endif
                        </div><!-- table-wrapper -->
                    </div><!-- card -->
                </div>

            </div>

        </div>


        <div class="d-flex mt-5">
            {{-- (paginate) ->Providers\AppServiceProvider.php --}}
            {{ $products->links() }}
            {{-- {{$appoint->onEachSide(1)-> links()}} --}}
        </div>
    </div>

@endsection
