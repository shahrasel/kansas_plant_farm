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
                <h1 class="text-lg-left text-md-left text-sm-center mb-30">Payment Successful</h1>
                <div class="row" style="margin-bottom: 50px;border-bottom: 1px solid;padding-bottom: 40px;">
                    Thanks for your order. Your order has been successfully completed!
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>
@endsection

