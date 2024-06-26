@extends('auth-layouts.app')
@section('title')
    Daftar
@endsection
@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}


<div class="container mt-5">
    <div class="row">
      <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand">
          <img src="{{ asset('assets/img/logo-sadasa-circle.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
        </div>

        <div class="card card-danger">
          <div class="card-header"><h4>Daftar</h4></div>

          <div class="card-body">
                <form method="POST" action="{{ route('register') }}" novalidate="">
                    @csrf
                                      
                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>   
                        @if (count($errors) > 0)
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        @else
                            <div class="invalid-feedback">
                            Silahkan isi nama Anda
                            </div>  
                        @endif                 
                        </div>

              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                @if (count($errors) > 0)
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @else
                    <div class="invalid-feedback">
                        Silahkan isi email Anda
                    </div>
                @endif
              </div>

           
                <div class="form-group">
                  <label for="password">Kata Sandi</label>
                  <input id="password" type="password" class="form-control pwstrength @error('password') is-invalid @enderror" data-indicator="pwindicator" name="password" required autocomplete="password">
                  @if (count($errors) > 0)
                  @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  @else
                    <div class="invalid-feedback">
                        Silahkan isi kata sandi Anda
                    </div>
                  @endif
                  <div id="pwindicator" class="pwindicator">
                    <div class="bar"></div>
                    <div class="label"></div>
                  </div>
                </div>
                
                <div class="form-group">
                  <label for="password2" class="d-block">Konfirmasi Kata Sandi</label>
                  <input id="password-confirm" type="password" class="form-control @error('password2') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">
                  @if (count($errors) > 0)
                  @error('password2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                  @else
                    <div class="invalid-feedback">
                        Silahkan isi kata sandi Anda
                    </div>
                  @endif
                </div>

                <div class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <div class="pull-center">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display() !!}
                              @if ($errors->has('g-recaptcha-response'))
                              <small>
                            <span class="text-danger" role="alert">
                                <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                            </span>
                        </small>
                        @endif
                            </div>
                        </div>
         

              <div class="form-group">
                <button type="submit" class="btn btn-danger btn-lg btn-block">
                    {{ __('Daftar') }}
                </button>
              </div>
            </form>
          </div>
        </div>

        <div class="mt-5 text-muted text-center">
            Sudah punya akun? <a href="/login">Masuk</a>
        </div>
        <div class="simple-footer">
          Copyright &copy; Sadasa Academy 2022
        </div>
      </div>
    </div>
  </div>


@endsection
