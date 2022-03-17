@extends('layouts.frontend_layout')


@section('title')
    Online Marketing - News Search
@endsection


@section('frontend_content')

<div id="blog-home " class="mt-5 pt-5 container" style="display: flex; justify-content: space-between;">
    <div>
        <h2 class="font-weight-bold ">News Search</h2>
        <hr>
    </div>

    <div class="" style="float:right">
        <form action="{{ url('search_news_query') }}" method="GET" class="search-form">
            {{ csrf_field() }}
            <div class="form-group">
                <div style="display: flex; justify-content: space-between;">
                    <input type="text" name="query" id="query" class="form-control mr-1"
                        {{-- value="{{request()->input('query')}}" --}} placeholder="search news...">

                    <button type="submit" class="btn text-white"> <i
                            class="search fal fa-search"></i></button>
                </div>
            </div>
        </form>
    </div>
</div>


    <section class=" container blog mb-5">
        <div class="row">

            @foreach ($news as $row)
                <div class="post col-lg-6 col-md-6 col-12 mt-5">
                    <a style="text-decoration: none;color:black" href="{{ url('news_details/' . $row->id) }}">
                        <div class="post-img">
                            <img style="height: 350px;  width: 100%;" class="img-fluid "
                                src="{{ asset('img_DB/news/' . $row->image) }}" alt="">
                        </div>
                        <h6 class="text-center font-weight-normal pt-3">{{ $row->title }}
                        </h6>
                        <p class="text-center"><small><small> {{ $row->created_at->diffForHumans() }},
                                    {{ $row->created_at }}</small></small></p>
                    </a>
                </div>
            @endforeach
            {{-- {{ $row->created_at->format('d/m/Y') }} --}}

        </div>
    </section>


    <!--pagination-->
    <div class="d-flex container mb-5">
        {{-- (paginate) ->Providers\AppServiceProvider.php --}}
        {{ $news->links() }}
        {{-- {{$appoint->onEachSide(1)-> links()}} --}}
    </div>
@endsection
