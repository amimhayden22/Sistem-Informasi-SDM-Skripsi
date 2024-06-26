@extends('auth-layouts.app')
@section('title')
    Masuk
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="{{ asset('assets/img/logo-sadasa-circle.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            @if (Session::has('forbidden'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Failed!</strong> {{ Session('forbidden') }}.
            </div>
            @endif


            <div class="card card-danger">
                <div class="card-header"><h4>{{ __('Masuk') }}</h4></div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}"  novalidate="">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <div>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus  tabindex="1" required>

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
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Kata Sandi') }}</label>
                            <div class="float-right">
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-small">
                                  Lupa Kata Sandi?
                                </a>
                                @endif
                            </div>
                            <div class="input-group mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" data-toggle="password" required aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <span class="input-group-text" id="basic-addon2">
                                      <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                                @if (count($errors) > 0)
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                @else
                                <div class="invalid-feedback">
                                    Silahkan isi password Anda
                                </div>
                                @endif
                            </div>
                        </div>


                        <div class="form-group {{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                            <div>
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
                            <div>
                                <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">
                                    {{ __('Masuk') }}
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-5 text-muted text-center">
                Untuk melihat buku panduan sistem bisa <a href="#">klik di sini</a>
              </div>
            <div class="simple-footer">
                Copyright &copy; Sadasa Academy {{ date('Y') }}
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('assets/js/bootstrap-show-password.js') }}"></script>
@endsection
