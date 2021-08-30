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
                <div class="row d-block" style="margin-bottom: 50px;border-bottom: 1px solid;padding-bottom: 40px;">
                    <p class="mb-30">Thanks for your order. Your order has been successfully completed!</p>

                    <p class="mb-30">INSTRUCTIONS: We will pull your plants and/or products and have them ready for curbside pickup within 1-2 days. You will be notified by email & text when plants/products are ready. All plants and/or products must be picked up by you within 5 days. Our main pick-up area is easily visible out front; please see map for large tree pickup area.</p>
                    <p class="mb-10">We are located at:</p>
                    <p class="mb-20">
                        1210 Lakeview ct.<br/>
                        Lawrence, KS 66049
                    </p>
                    <p>We look forward to seeing you!</p>
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>
@endsection

