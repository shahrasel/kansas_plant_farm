@extends('layouts.app')
@section('custom_styles')
    <style>
        .card {
            background-color: black;
        }
        .single-input-item input:focus {
            background: #000 !important;
        }
    </style>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
<!--                <div class="card-header">{{ __('Register') }}</div>-->
                <h2 class="card-body">Register</h2>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf


<!--                        <div class="single-input-item">
                            <label for="com-name">First Name</label>
                            <input type="text" id="firstname" @error('firstname') is-invalid @enderror value="{{ old('firstname') }}" required />
                        </div>-->
                            <!--<div class="single-input-item">
                                <input id="firstname" type="text" @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                @error('firstname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>-->



<!--                        <div class="single-input-item">
                            <label for="com-name">Last Name</label>
                            <input type="text" id="lastname" @error('lastname') is-invalid @enderror" value="{{ old('lastname') }}" required />
                        </div>

                        <div class="single-input-item">
                            <label for="email">Email</label>
                            <input type="text" id="email" @error('email') is-invalid @enderror" value="{{ old('email') }}" required />

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>-->

<!--                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>
                                <div class="col-md-6">
                                    <input id="firstname" type="text" class="form-control @error('firstname') is-invalid @enderror" name="firstname" value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                                    @error('firstname')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>-->

                            <div class="single-input-item">
                                <label for="firstname">{{ __('First Name') }}</label>
                                <input id="firstname" type="text" name="firstname" value="{{ old('firstname') }}" required autocomplete="email" autofocus>

                                @error('firstname')
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>


<!--                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" autofocus>

                                @error('lastname')
                                <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>-->


                        <div class="single-input-item">
                            <label for="lastname">{{ __('Last Name') }}</label>
                            <input id="lastname" type="text" name="lastname" value="{{ old('lastname') }}" required autocomplete="email" autofocus>

                            @error('lastname')
                            <span class="invalid-feedback" role="alert" style="display: block">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

<!--                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert" style="display: block">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>-->


                        <div class="single-input-item">
                            <label for="email">{{ __('E-Mail Address') }}</label>
                            <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert" style="display: block">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="single-input-item">
                            <label for="phone">{{ __('Phone') }}</label>
                            <input id="phone" type="text" name="phone" value="{{ old('phone') }}" required>

                            @error('phone')
                            <span class="invalid-feedback" role="alert" style="display: block">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>


                        <div class="single-input-item">
                            <label for="password">Password</label>
                            <input type="password" id="password" @error('password') is-invalid @enderror value="{{ old('password') }}" name="password" required />

                            @error('password')
                                <span class="invalid-feedback" role="alert" style="display: block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


<!--                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>-->
                        <div class="single-input-item">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" name="password_confirmation" required autocomplete="new-password">
                        </div>


<!--                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>-->

<!--                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">-->

                        <div class="col-md-6 offset-md-4" style="margin-top: 30px;">
                            <input class="btn btn-sqr" type="submit" name="submit" value="{{ __('Register') }}">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
