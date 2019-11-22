@extends('Front.main')
@section('content')
    <!-- MAIN SECTION -->

    <section id="article-section" class="line archive">
        <div style="justify-content: center; align-items: center">
            <div class="margin">
                <!-- ARTICLES -->

                <div class="s-12 l-12">
                @foreach($news as $new)
                    <!-- ARTICLE 1 -->
                        <article class="margin-bottom">

                            <div class="post-1 line">
                                <!-- image -->
                                <div class="s-12 l-11 post-image">
                                    <a href="{{route('Front.archive.view',$new->id)}}"><img
                                            src="{{asset('images/news/'. \App\Models\News::find($new -> id) -> img_url)}}"
                                            alt="Fashion"></a>
                                </div>
                                <!-- date -->
                                <div class="s-12 l-1 post-date">
                                    @php
                                        $mydate=new \Carbon\Carbon($new->created_at);
                                        $day=$mydate->format('j');
                                        $month=$mydate->format('M');
                                    @endphp
                                    <p class="date">{{$day}}</p>
                                    <p class="month">{{$month}}</p>
                                </div>
                            </div>
                            <!-- text -->
                            <div class="post-text">
                                <a href="{{route('Front.archive.view',$new->id)}}">
                                    <h2>{{$new->title}}</h2>
                                </a>
                                <p>

                                    {!! substr(strip_tags($new->content),0,430,).'...' !!}
                                </p>
                                <a class="continue-reading" href="{{route('Front.archive.view',$new->id)}}">Continue
                                    reading</a>
                            </div>
                        </article>
                @endforeach
                <!-- ARTICLE 2 -->


                    <!-- ARTICLE 3 -->

                    <!-- ARTICLE 4 -->


                    <!-- ARTICLE 5 -->

                </div>
                <!-- SIDEBAR -->

            </div>
        </div>
    </section>

@endsection
