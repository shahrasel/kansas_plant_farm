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
        <div class="checkout-page-wrapper section-padding pt-4">
            <div class="container">
                <h1 class="text-lg-left text-md-left text-sm-center mb-30">Upcoming Events</h1>
                @foreach($event_lists as $event_list)
                    <div class="row" style="margin-bottom: 50px;border-bottom: 1px solid;padding-bottom: 40px;">
                        <div class="col-xl-4 col-xxl-4 col-lg-4 col-md-4 col-sm-6 pb-4">
                            <img src="img/event/{{ $event_list->image }}" />
                        </div>

                        <div class="col-xl-8 col-xxl-8 col-lg-8 col-md-8 col-sm-6">
                            <h3 style="color: yellow">{{ $event_list->name }}</h3>
                            <div>
                                <span style="min-width:100px;display: inline-block;">Date/Time</span>
                                <span style="color: yellow">
                                    @if(date('d',strtotime($event_list->start_date))==date('d',strtotime($event_list->end_date)) && date('F',strtotime($event_list->start_date))==date('F',strtotime($event_list->end_date)) && date('Y',strtotime($event_list->start_date))==date('Y',strtotime($event_list->end_date)))
                                        {{ date('g:ia',strtotime($event_list->start_date)) }} - {{ date('g:ia',strtotime($event_list->end_date)) }}, {{ date('l, F d, Y',strtotime($event_list->start_date)) }}
                                    @else
                                        {{ date('g:ia',strtotime($event_list->start_date)) }}, {{ date('l, F d, Y',strtotime($event_list->start_date)) }} - {{ date('g:ia',strtotime($event_list->end_date)) }}, {{ date('l, F d, Y',strtotime($event_list->end_date)) }}
                                    @endif
                                </span>
                            </div>
                            <div>
                                <span style="min-width:100px;display: inline-block;vertical-align: top;">Location</span>
                                <span style="color: yellow;display: inline-block">{{ $event_list->location_address_1 }}<br/>{{ $event_list->location_address_2 }}
                                </span>
                            </div>
                            <div>
                                <span style="min-width:100px;display: inline-block;">Price</span>
                                <span style="color: yellow">${{ $event_list->price }}</span>
                            </div>
                            <div>
                                <span style="min-width:100px;display: block;">Description</span>
                                <span >{!! $event_list->description !!}</span>
                            </div>
                            <div>
                                <span style="min-width: 150px;display: inline-block;margin-right: 50px;"><a href="https://www.google.com/maps/place/{{ $event_list->location_address_1 }}, {{ $event_list->location_address_2 }}" class="btn btn-hero" target="_blank">Get Directions</a></span>
                                <span><a href="shop.html" class="btn btn-hero" target="_blank">Buy Ticket</a></span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>
@endsection

