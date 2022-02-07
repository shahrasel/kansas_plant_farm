@extends('layouts.app')
@section('custom_styles')
    <style>
        .form-check-label {
            margin-left: 4px !important;
        }
        </style>
@endsection
@section('content')
    <form action="{{ route('appointment') }}" method="post">
        @csrf
        <main>
            <!-- checkout main wrapper start -->
            <div class="checkout-page-wrapper section-padding pt-4" >
                <div class="container">
                    <h1 class="text-lg-left text-md-left text-sm-center mb-30">SELECT A DATE</h1>
                    <div style="margin-bottom: 30px;">
                        <section class="py-3">
                            <div class="form-group row">
                                <div class="col-12">
                                    <ul class="d-flex list-unstyled flex-wrap">
                                        @php
                                            $j = 0;
                                        @endphp
                                        @for($i=time()+86400; $i<=time()+(14*86400); $i+=86400)
                                            @php $j++; @endphp
                                            <li class="mx-2 my-3 border border-dark text-center cal_li">
                                                <a class="schedule_check" href="#" class="text-dark text-decoration-none" data-target="#slideModal" data-toggle="modal" data-date="{{ date('Y-m-d', $i) }}" data-formatteddate="{{ date('D, M d', $i) }}">
                                                    <span class="d-block py-1 border-dark border-bottom mb-1">
                                                        {{ date('D', $i) }}
                                                    </span>
                                                    <span class="d-block font-weight-bold" style="font-size: 30px">{{ date('d', $i) }}</span>
                                                    <span class="d-block" style="font-size: 12px">{{ date('M', $i) }}</span>
                                                </a>
                                            </li>

                                        @endfor
                                    </ul>
                                </div>
                            </div>
                        </section>
                    </div>


                </div>
            </div>
            <!-- checkout main wrapper end -->
        </main>
        @php
            $j = 0;
        @endphp
        @for($i=time()+86400; $i<=time()+(14*86400); $i+=86400)
            @php $j++; @endphp
<!--            <div aria-hidden="true" class="onboarding-modal modal fade animated" id="slideModal_{{ strtolower(date('l', $i)).(($j<=7)?'_1':'_2') }}" role="dialog" tabindex="-1">-->
            <div aria-hidden="true" class="onboarding-modal modal fade animated" id="slideModal" role="dialog" tabindex="-1">
                <div class="modal-dialog modal-centered" role="document">
                    <div class="modal-content">
                        <button aria-label="Close" class="close" data-dismiss="modal" type="button"><span class="os-icon os-icon-close"></span></button>
                        <div class="onboarding-slider-w">
                            <div class="onboarding-slide">
                                <div id="all_checkbox" class="onboarding-content with-gradient">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endfor
        <input type="hidden" name="date" id="date" value="">
        <input type="hidden" name="final_date" id="final_date" value="">
    </form>
    <form action="" method="post" id="getTimting">
        @csrf
        <input type="hidden" name="date1" id="date1" value="">
    </form>
@endsection
@section('javascript')
    <script type="text/javascript">
        $(function(){
            $(".schedule_check").on('click', function (e) {
                e.preventDefault();
                $("#date").val($(this).data('formatteddate'));
                $("#final_date").val($(this).data('date'));

                $("#date1").val($(this).data('date'));


                $.ajax({
                    type: "POST",
                    url: "{{ route('get_available_timing')  }}",
                    data: $("#getTimting").serialize(),
                    success: function (data) {
                        var parsedJSON = JSON.parse(data);

                        if(parsedJSON.length >0) {
                            $html_str ='<h4 class="onboarding-title pb-4 text-center">Please select time for '+$("#date").val()+'.</h4>';
                            $html_str += '<div><div class="row">';
                            for (var i=0;i<parsedJSON.length;i+=4) {
                                if(parsedJSON[i].length >0) {
                                    $html_str += '<div class="col-3 text-left"><div class="form-group">';

                                    $html_str += '<input id="'+parsedJSON[i]+'"  type="radio" value="'+parsedJSON[i]+'" name="time">';
                                    $html_str += '<label for="'+parsedJSON[i]+'" class="form-check-label">'+parsedJSON[i]+'</label>';

                                    $html_str += '</div></div>';
                                }
                                if(parsedJSON[i+1] !== undefined) {
                                    $html_str += '<div class="col-3 text-left"><div class="form-group">';

                                    $html_str += '<input id="'+parsedJSON[i+1]+'"  type="radio" value="'+parsedJSON[i+1]+'" name="time">';
                                    $html_str += '<label for="'+parsedJSON[i+1]+'" class="form-check-label">'+parsedJSON[i+1]+'</label>';

                                    $html_str += '</div></div>';
                                }
                                if(parsedJSON[i+2] !== undefined) {
                                    $html_str += '<div class="col-3 text-left"><div class="form-group">';

                                    $html_str += '<input id="'+parsedJSON[i+2]+'"  type="radio" value="'+parsedJSON[i+2]+'" name="time">';
                                    $html_str += '<label for="'+parsedJSON[i+2]+'" class="form-check-label">'+parsedJSON[i+2]+'</label>';

                                    $html_str += '</div></div>';
                                }
                                if(parsedJSON[i+3] !== undefined) {
                                    $html_str += '<div class="col-3 text-left"><div class="form-group">';

                                    $html_str += '<input id="'+parsedJSON[i+3]+'"  type="radio" value="'+parsedJSON[i+3]+'" name="time">';
                                    $html_str += '<label for="'+parsedJSON[i+3]+'" class="form-check-label">'+parsedJSON[i+3]+'</label>';

                                    $html_str += '</div></div>';
                                }
                            }
                            $html_str += '</div>';
                            $html_str += '<div class="row"><div class="col-12 text-center"><button type="submit" class="rounded font-weight-bold" style="min-width: 150px;height: 50px;background-color:#7fbc03;color:#fff">NEXT</button></div></div></div>';
                        }
                        else {
                            $html_str = '<div><div class="row">';
                                $html_str += '<div class="col-12">No time slot found!!</div>';
                            $html_str += '</div></div>';
                        }

                        $("#all_checkbox").html($html_str);
                    }
                });
            });
        });
    </script>
@endsection
