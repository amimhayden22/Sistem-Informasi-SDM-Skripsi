@extends('dashboard-layouts.app')
@section('title')
Tambah Data Pengguna
@endsection
@section('style-libraries')
<link rel="stylesheet" href="{{ asset('assets/css/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
@endsection
@section('content')
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="{{ route('users.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Form Tambah Pengguna</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dasbor</a></div>
        <div class="breadcrumb-item"><a href="{{ route('users.index') }}">Manajemen Pengguna</a></div>
        <div class="breadcrumb-item">Form Tambah Pengguna</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Form Tambah Pengguna</h2>
        <p class="section-lead">
          Yang memiliki tanda <span class="text-danger">*</span> wajib diisi!
        </p>

      @if (Session::has('message'))
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              <span class="sr-only">Close</span>
          </button>
          <strong>Peringatan!</strong> {{ Session('message') }} <a href="{{ route('employees.create') }}"><ins> klik di sini.<ins></a>
      </div>
      @endif

      <div class="card">
        <div class="card-header">
          <h4>Form</h4>
        </div>

        <div class="card-body">
        <form action="{{ route('users.index') }}" method="POST" class="needs-validation" novalidate="">
            @csrf
          <div class="form-group">
            <label>Nama<span class="text-danger">*</span></label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Contoh: Gus Khamim" value="{{ old('name') }}" required autocomplete="name">
            @if (count($errors) > 0)
              @error('name')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            @else
              <div class="invalid-feedback">
                Mohon isikan nama Anda
              </div>
            @endif
          </div>

          <div class="form-group">
            <label>Email<span class="text-danger">*</span></label>
            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Contoh: mail@sadasa.id" value="{{ old('email') }}" required autocomplete="email">
            @if (count($errors) > 0)
              @error('email')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            @else
              <div class="invalid-feedback">
                Mohon isikan email Anda
              </div>
            @endif
          </div>

          <div class="form-group">
            <label>Kata Sandi</label>
            <div class="input-group">
              <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" data-toggle="password" placeholder="Masukkan Kata Sandi" required>
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fa fa-eye"></i>
                </span>
              </div>
              @if (count($errors) > 0)
                @error('password')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              @else
                <div class="invalid-feedback">
                  Mohon isikan kata sandi Anda
                </div>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label>Konfirmasi Kata Sandi</label>
            <div class="input-group">
              <input id="password-confirm" type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" data-toggle="password" placeholder="Konfirmasi Kata Sandi" required autocomplete="new-password">
              <div class="input-group-append">
                <span class="input-group-text">
                  <i class="fa fa-eye"></i>
                </span>
              </div>
              @if (count($errors) > 0)
                @error('password_confirmation')
                  <div class="invalid-feedback">
                    {{ $message }}
                  </div>
                @enderror
              @else
                <div class="invalid-feedback">
                  Mohon konfirmasi kata sandi Anda
                </div>
              @endif
            </div>
          </div>

          <div class="form-group">
            <label for="role" class="form-label">Hak Akses<span class="text-danger">*</span></label>
            <select class="form-control select2 @error('role') is-invalid @enderror" name="role" required autocomplete="role">
              <option disabled selected>- Pilih Hak Akses-</option>
              <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>user</option>
              <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>admin</option>
              <option value="karyawan" {{ old('role') == 'karyawan' ? 'selected' : '' }}>karyawan</option>
              <option value="manajer" {{ old('role') == 'manajer' ? 'selected' : '' }}>manajer</option>
              <option value="administrator" {{ old('role') == 'administrator' ? 'selected' : '' }}>administrator</option>
            </select>
            @if (count($errors) > 0)
              @error('role')
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
              @enderror
            @else
              <div class="invalid-feedback">
                Mohon isikan role Anda
              </div>
            @endif
          </div>

          <div class="float-right">
            <div class="form-group">
              <button class="btn btn-primary" type="submit">Buat</button>
            </div>
          </div>
        </form>
        </div>
      </div>
    </div>
  </section>
@endsection
@section('script-libraies')
<script src="{{ asset('assets/css/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap-show-password.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
