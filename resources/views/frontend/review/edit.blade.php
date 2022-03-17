@extends('layouts.frontend_layout')


@section('title')
    AgroBd - Review Edit
@endsection


@section('frontend_content')
    <section id="cart-home " class="mt-5  pt-5 container">
        <h2 class="font-weight-bold ">Review Edit</h2>
        <hr>
    </section>


    <section>
        <div class="container py-5">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-3">
                        <div class="card-body ">
                            <h5 class="mb-3">You can update your review <strong>({{ $review->product->product_name }})</strong></span></h5>
                            <form action="{{ url('update-review/'.$review->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="product_id" value="{{ $review->product->id }}">

                                <textarea class="form-control" name="user_review" rows="5"
                                    placeholder="Write a review">{{ $review->user_review }}</textarea>
                                <button type="submit" class="btn btn-warning mt-3">Update Review</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
