@extends('admin.layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{ asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css') }}" rel="stylesheet">
@endsection
@section('title')
    Login
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                <div class="row wd-100p mx-auto text-center">
                    <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                        <img src="{{ asset('Files/login/login.svg') }}"
                            class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
                    </div>
                </div>
            </div>
            <!-- The content half -->
            <div class="col-md-6 col-lg-6 col-xl-5 bg-white">
                <div class="login d-flex align-items-center py-2">
                    <!-- Demo content-->
                    <div class="container p-0">
                        <div class="row">
                            <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                <div class="card-sigin">

                                    <div class="card-sigin">
                                        <div class="main-signup-header text-left" style="direction: ltr">
                                            {{-- <h5 class="font-weight-semibold mb-4">Please sign in to continue.</h5> --}}
                                            <form action="{{ route('login') }}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label>Email Or Phone</label>
                                                    {{-- <input name="email" class="form-control"
                                                        placeholder="Enter your Email" type="email"> --}}
                                                        <input id="email" type="text" class="form-control
                                                        @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                                </div>
                                                <div class="form-group">
                                                    <label>Password</label>
                                                    <input name="password" class="form-control"
                                                        placeholder="123456789" type="password">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                                <button type="submit" name="signin"
                                                    class="btn btn-main-primary btn-block">Sign In</button>
                                            </form>
                                            {{-- <div class="main-signin-footer mt-1">
                                                <p><a href="{{ route('admin.password.request') }}">Forgot password?</a></p>
                                            </div> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- End -->
                </div>
            </div><!-- End -->
        </div>
    </div>
@endsection
