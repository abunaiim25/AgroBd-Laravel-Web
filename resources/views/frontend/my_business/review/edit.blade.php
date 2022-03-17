@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Business Review Edit
@endsection


@section('frontend_content')
    <section id="cart-home " class="mt-5  pt-5 container">
        <h2 class="font-weight-bold ">Business Review Edit</h2>
        <hr>
    </section>


    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-3">
                        <div class="card-body ">
                            <h5 class="mb-3">You can update your review <strong>({{ $business_review->business->product_name }})</strong></span></h5>
                            <form action="{{ url('update_review_business/'.$business_review->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="business_product_id" value="{{ $business_review->business->id }}">

                                <textarea class="form-control" name="user_review" rows="5"
                                    placeholder="Write a review">{{ $business_review->user_review }}</textarea>
                                <button type="submit" class="btn btn-warning mt-3">Update Review</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
