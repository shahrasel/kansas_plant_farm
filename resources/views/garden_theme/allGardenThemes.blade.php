@extends('layouts.app')
@section('custom_styles')
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}" type="text/css" media="screen" />
@endsection
@section('custom_event_js')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.min.js">\x3C/script>')</script>
@endsection
@section('content')
    <main>
        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding pt-4" >
            <div class="container">
                <h1 class="text-lg-left text-md-left text-sm-center mb-30">Garden Ideas</h1>
                @foreach($garden_theme_lists as $garden_theme_list)
                    @if(!empty($garden_theme_list->images))
                        @if(count(json_decode($garden_theme_list->images))>0)
                        <div style="margin-bottom: 60px;border-bottom: 1px solid;padding-bottom: 50px;">
                            <section class="slider">
                                <div id="slider_{{ $garden_theme_list->id }}" class="flexslider">
                                    <ul class="slides">
                                        @foreach(json_decode($garden_theme_list->images) as $image)
                                            <li>
                                                <img src="img/garden_theme/large/{{ $garden_theme_list->id }}/{{ $image }}" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div id="carousel_{{ $garden_theme_list->id }}" class="flexslider">
                                    <ul class="slides">
                                        @foreach(json_decode($garden_theme_list->images) as $image)
                                            <li>
                                                <img src="img/garden_theme/thumb/{{ $garden_theme_list->id }}/{{ $image }}" />
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </section>
                            <section>
                                <h3 style="text-align: center;color: yellow;padding-bottom: 10px;">{{ $garden_theme_list->title }}</h3>
                                {!! $garden_theme_list->description !!}
                            </section>
                        </div>
                    @endif
                    @endif
                @endforeach
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>
@endsection
@section('javascript')
    <script  src="{{ asset('js/jquery.flexslider.js') }}"></script>
    <script type="text/javascript">
        $(window).load(function(){
            @foreach($garden_theme_lists as $garden_theme_list)
                @if(!empty($garden_theme_list->images))
                    @if(count(json_decode($garden_theme_list->images))>0)
                        $('#carousel_{{ $garden_theme_list->id }}').flexslider({
                            animation: "slide",
                            controlNav: false,
                            animationLoop: false,
                            slideshow: false,
                            itemWidth: 210,
                            itemMargin: 5,
                            asNavFor: '#slider_{{ $garden_theme_list->id }}'
                        });

                        $('#slider_{{ $garden_theme_list->id }}').flexslider({
                            animation: "slide",
                            controlNav: false,
                            animationLoop: false,
                            slideshow: false,
                            sync: "#carousel",
                            start: function(slider){
                                $('body').removeClass('loading');
                            }
                        });
                    @endif
                @endif
            @endforeach
        });
    </script>
@endsection
