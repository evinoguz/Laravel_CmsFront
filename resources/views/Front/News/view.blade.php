@extends('Front.main')
@section('content')
    <section id="article-section" class="line archive">
        <div class="margin">
            <!-- ARTICLES -->
            <div class="s-12 l-12">

                <!-- ARTICLE 1 -->

                <article class="margin-bottom">
                    <div class="post-1 line">
                        <!-- image -->
                        <div class="s-12 l-11 post-image">
                            <a href="post-1.html"><img
                                    src="{{asset('images/news/'. \App\Models\News::find($news->id)->img_url)}}"
                                    alt="Fashion"></a>
                        </div>
                        <!-- date -->
                        <div class="s-12 l-1 post-date">
                            @php
                                $mydate=new \Carbon\Carbon($news->created_at);
                                $day=$mydate->format('j');
                                $month=$mydate->format('M');

                            @endphp
                            <p class="date">{{$day}}</p>
                            <p class="month">{{$month}}</p>
                        </div>
                    </div>
                    <!-- text -->
                    <div class="post-text">
                        <a href="post-1.html">
                            <h2>{{$news->title}}</h2>
                        {!! $news->content !!}

                    </div>
                </article>

                <!-- ARTICLE 2 -->


                <!-- ARTICLE 3 -->

                <!-- ARTICLE 4 -->


                <!-- ARTICLE 5 -->

            </div>
            <!-- SIDEBAR -->

        </div>
    </section>
@endsection
