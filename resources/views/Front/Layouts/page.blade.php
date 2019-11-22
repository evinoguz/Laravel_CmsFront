@extends('Front.main')
@section('content')
    <section id="article-section" class="line">
        <div class="margin">
            <!-- ARTICLES -->
            <div class="s-12 l-12">
                <!-- ARTICLE 1 -->
                <article class="margin-bottom">
                    <div class="post-1 line">
                        <!-- image -->

                        <!-- date -->
                        <div class="s-12 l-1 post-date">
                            @php
                            $myDate=new \Carbon\Carbon($menu->created_at);
                            $date=$myDate->format('j');
                            $month=$myDate->format('M');


                            @endphp
                            <p class="date">{{$date}}</p>
                            <p class="month">{{$month}}</p>
                        </div>
                    </div>
                    <!-- text -->
                    <div class="post-text">
                        <h1>{!! $menu->content !!}</h1>

                    </div>
                </article>
                <!-- AD REGION -->

            </div>
            <!-- SIDEBAR -->

        </div>
    </section>
@endsection
