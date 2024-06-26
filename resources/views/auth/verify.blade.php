@extends('auth-layouts.app')
@section('title')
    Verify Email
@endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
                <img src="{{ asset('assets/img/logo-sadasa-circle.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            <div class="card card-danger">
                <div class="card-header"><h4>{{ __('Verify Your Email Address') }}</h4></div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Anda belum melakukan verifikasi akun melalui email, silakan cek email Anda untuk melakukan verifikasi,') }}
                    {{ __('Jika Anda tidak menerima email') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik disini untuk mengirim verifikasi ulang') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
