@extends('auth-layouts.app')
@section('title')
Lupa Kata Sandi
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="{{ asset('assets/img/logo-sadasa-circle.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-danger">
                <div class="card-header"><h4>{{ __('Lupa Kata Sandi') }}</h4></div>

                <div class="card-body">
                    <p class="text-muted">Kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda</p>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}" class="needs-validation" novalidate="">
                        @csrf

                       
                            <label for="email">{{ __('Email') }}</label>

                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                <div class="invalid-feedback">
                                    Silahkan masukkan email Anda
                            </div>


                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
              
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">
                                    {{ __(' Lupa Kata Sandi') }}
                                </button>
                            </div>
                       
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="simple-footer">
    Copyright &copy; Sadasa Academy 2022
</div>




@endsection
