@extends('auth-layouts.app')
@section('title')
    Reset Kata Sandi
@endsection
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="{{ asset('assets/img/logo-sadasa-circle.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            
            <div class="card card-danger">
                <div class="card-header"><h4>{{ __('Reset Kata Sandi') }}</h4></div>

                <div class="card-body">
                    <p class="text-muted">Kami akan mengirimkan tautan untuk mengatur ulang kata sandi Anda</p>
                    <form method="POST" action="{{ route('password.update') }}" class="needs-validation" novalidate="">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>

                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>
                                <div class="invalid-feedback">
                                    Silahkan masukkan email Anda
                            </div>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password">{{ __('Kata Sandi') }}</label>

                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                <div class="invalid-feedback">
                                    Silahkan masukkan kata sandi Anda
                                </div>
                                
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm">{{ __('Konfirmasi Kata Sandi') }}</label>

                            <div class="form-group">
                                <input id="password-confirm" type="password" class="form-control @error('password2') is-invalid @enderror" name="password_confirmation" required autocomplete="new-password">

                                <div class="invalid-feedback">
                                    Silahkan masukkan kata sandi Anda
                                </div>
                                
                                @error('password2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                                <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">
                                    {{ __('Reset Kata Sandi') }}
                                </button>
                        </div>

                        <div class="text-center mt-4 mb-3">
                            <div class="text-job text-muted">
                                <a href="/login"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali ke Login</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
             <div class="simple-footer">
                Copyright &copy; Sadasa Academy 2022
            </div>
        </div>
    </div>
</div>




    

    <!-- General CSS Files -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-37J1WNBFQ6"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-37J1WNBFQ6');
    </script>

    <!-- CSS Libraries -->
    
    <!-- Template CSS -->
    <link rel="stylesheet" href="https://project.sadasa.id/backend/assets/css/style.css">
    <link rel="stylesheet" href="https://project.sadasa.id/backend/assets/css/components.css">

    <!-- Custom CSS -->
 

{{-- 
    <div id="app">
        <section class="section">
            <div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="https://sadasa.id/frontend/assets/images/logo/logo-sadasa-circle.png" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-danger">
                <div class="card-header"><h4>Reset Password</h4></div>

                <div class="card-body">
                                        
                    <p class="text-muted">We will send a link to reset your password</p>
                    <form method="POST" action="https://project.sadasa.id/password/reset" class="needs-validation" novalidate="">
                        <input type="hidden" name="_token" value="NMYljVTYixNUn13iwzZZpaNMlNYxvpewoM6D4hgj">                       
                         <input type="hidden" name="token" value="cd3676f01644010e5972fa2f51a232041cf8fffe4e0386528eeddcdd8cdfc577">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email" class="form-control " name="email" value="ilhamprabowo009@gmail.com" required autocomplete="email" autofocus tabindex="1">
                                                            
                            <div class="invalid-feedback">
                                    Please fill in your email
                            </div>
                                                    </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control " name="password" required autocomplete="new-password">
                                                            
                            <div class="invalid-feedback">
                                    Please fill in your password
                                </div>
                                                    </div>

                        <div class="form-group">
                            <label for="password-confirm">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-danger btn-lg btn-block" tabindex="4">
                                Reset Password
                            </button>
                        </div>

                        <div class="text-center mt-4 mb-3">
                            <div class="text-job text-muted">
                                <a href="https://project.sadasa.id/login"><i class="fa fa-arrow-left" aria-hidden="true"></i> Kembali ke Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="simple-footer">
                Copyright &copy; Sadasa Academy 2022
            </div>
        </div>
    </div>
</div>
        </section>
    </div> --}}

    <!-- General JS Scripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://project.sadasa.id/backend/assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    
    <!-- Template JS File -->
    <script src="https://project.sadasa.id/backend/assets/js/scripts.js"></script>
    <script src="https://project.sadasa.id/backend/assets/js/custom.js"></script>

    <!-- Page Specific JS File -->
    
    <!-- Custom JS -->
 

@endsection
