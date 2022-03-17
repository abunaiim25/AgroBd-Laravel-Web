@extends('layouts.frontend_layout')


@section('title')
    AgroBd - News Details
@endsection


@section('frontend_content')
    <section id="blog-home " class="my-5 pt-5 container">
        <h2 class="font-weight-bold ">News Details</h2>
        <hr>
    </section>

    <div class=" container blog mb-5">
        <div class="row">
            <div class="post col-lg-8 col-md-8 col-12 ">

                <div class="post-img">
                    <img style="height: 400px;  width: 100%;" class="img-fluid "
                        src="{{ asset('img_DB/news/' . $news->image) }}" alt="">

                    <div class="top-left badge badge-success">
                        {{ $news->category }}
                    </div>
                </div>

                <div><small><small> {{ $news->created_at->diffForHumans() }},
                            {{ $news->created_at }} |</small></small>
                    <small><small>By {{ $news->writer_name }} |</small></small>
                    <small><small>{{ $news->place }} </small></small>
                </div>

                <h3 class="mt-5"><strong>{{ $news->title }}</strong></h3>

                <div style="text-align: justify;">
                    <p>{{ $news->description }}</p>
                </div>
            </div>
            {{-- {{ $row->created_at->format('d/m/Y') }} --}}

            <div class="col-lg-4 col-md-4 col-12">

                <h3 class="sidebar-title"><strong>Search News</strong></h3>
                <div class="row">
                    <div class="col-lg-10 col-md-10 col-12">
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


                <div class="sidebar-block mt-3">
                    <h3 class="sidebar-title"><strong>Recent News</strong></h3>

                    @foreach ($latest_news as $item)
                        <div class="card p-2 my-2">
                            <div class="blog-item">
                                <div class="row">
                                    <div class="col-lg-4 col-md-12 col-12 ">
                                        <a class="post-thumb" href="{{ url('news_details/' . $item->id) }}">

                                            <div class="post-img">
                                                <img style="height: 90px; width: 100%; border-radius:3px;"
                                                    src="{{ asset('img_DB/news/' . $item->image) }}" alt="">
                                            </div>

                                        </a>
                                    </div>

                                    <div class="col-lg-8 col-md-12 col-12 mt-1">
                                        <div class="content">
                                            <h5 class="post-title">
                                                <a style="text-decoration: none; color: coral"
                                                    href="{{ url('news_details', $item->id) }}">{{ $item->title }}</a>
                                            </h5>

                                            <div style="line-height: 1;">
                                                <small><small> {{ $item->created_at->diffForHumans() }} |</small></small>
                                                <small><small>By {{ $item->writer_name }} |</small></small>
                                                <small><small>{{ $item->place }}</small></small>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>


            </div>
        </div>
    </div>
@endsection
