@extends('layouts.app')
<!-- Section: Design Block -->
@section('content')

    <section class="background-radial-gradient overflow-hidden" style="height: 100vh">


        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h1 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        The best choice for online exam <br/>
                        <span style="color: hsl(218, 81%, 75%)">Proctor exam</span>
                    </h1>
                    <p class="mb-4 opacity-70" style="color: hsl(218, 81%, 85%)">
                        Our website help to make the exam without cheating and make analysis for
                        every student during the exam to prevent cheating.
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>

                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf

                                <div class="row mb-3">
                                    <label for="name"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text"
                                               class="form-control @error('name') is-invalid @enderror" name="name"
                                               value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="email"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email"
                                               class="form-control @error('email') is-invalid @enderror" name="email"
                                               value="{{ old('email') }}" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="username"
                                           class="col-md-4 col-form-label text-md-end">{{ __('username') }}</label>

                                    <div class="col-md-6">
                                        <input id="username" type="username"
                                               class="form-control @error('username') is-invalid @enderror"
                                               name="username"
                                               value="{{ old('username') }}" required autocomplete="username">

                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="row mb-3">
                                    <label for="password"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password" type="password"
                                               class="form-control @error('password') is-invalid @enderror"
                                               name="password"
                                               required autocomplete="new-password">

                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                                                <strong>{{ $message }}</strong>
                                                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password-confirm"
                                           class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                    <div class="col-md-6">
                                        <input id="password-confirm" type="password" class="form-control"
                                               name="password_confirmation" required autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <video id="stream" width="370" height="100">
                                        <canvas id="capture" width="370" height="100">
                                        </canvas>
                                    </video>
                                    <br>
                                    <button id="btn-capture" type="button"
                                            class="btn btn-primary justify-content-center m-auto mt-3"
                                            style="width:70%;background: #7212a9">
                                        Capture Image
                                    </button>
                                    <br><br>
                                    <div id="snapshot" class="d-flex justify-content-center"></div>
                                    <input type="hidden" id="image_hidden" name="image_hidden">
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button type="submit" class="btn btn-primary " style="width: 72%; background: #7212a9">
                                        {{ __('Register') }}
                                    </button>

                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
<!-- Section: Design Block -->
