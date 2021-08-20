@extends('layouts.app')
@section('content')
    <main>
        <!-- checkout main wrapper start -->
        <div class="checkout-page-wrapper section-padding pt-4" >
            <div class="container">
                <h1 class="text-lg-left text-md-left text-sm-center mb-30">Our Guarantee</h1>
                <div style="margin-bottom: 30px;">
                    <section class="py-3">
                        {!! $setting_info->our_gurantee !!}
                    </section>
                </div>
            </div>
        </div>
        <!-- checkout main wrapper end -->
    </main>
@endsection
