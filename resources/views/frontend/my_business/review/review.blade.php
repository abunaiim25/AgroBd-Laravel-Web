@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Business Review
@endsection


@section('frontend_content')
    <section id="cart-home " class="mt-5  pt-5 container">
        <h2 class="font-weight-bold ">Business Review</h2>
        <hr>
    </section>


    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-3">
                        <div class="card-body ">
                                <h5 class="mb-3">You are writing a review for <strong>{{ $business->product_name }}</strong></h5>
                                <form action="{{ url('add_review_business') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="business_product_id" value="{{ $business->id }}">

                                    <textarea class="form-control" name="user_review"  rows="5" placeholder="Write a review"></textarea>
                                    <button type="submit" class="btn btn-warning mt-3">Submit Review</button>
                                </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 
@endsection
