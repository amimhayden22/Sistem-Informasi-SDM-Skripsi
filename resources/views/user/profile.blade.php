@extends('dashboard-layouts.app')
@section('title')
Profil
@endsection
@section('style-libraries')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link rel="stylesheet" href="{{ asset('assets/css/select2/dist/css/select2.min.css') }}">
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Profil</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dasbor</a></div>
            <div class="breadcrumb-item">Profil</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Hai, {{ auth()->user()->name }}</h2>
        <p class="section-lead">
            Ubah informasi tentang diri Anda di halaman ini.
        </p>

        <div class="row mt-sm-4">
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card profile-widget">
                    <div class="profile-widget-header">
                        <img alt="image" src="{{ asset('assets/img/avatar/avatar-1.png') }}" class="rounded-circle profile-widget-picture">
                        <div class="profile-widget-items">
                        </div>
                    </div>
                    <div class="profile-widget-description">
                        <div class="profile-widget-name">{{ auth()->user()->name }} <div class="text-muted d-inline font-weight-normal"><br>{{ Auth::user()->employee->position->name }}</br></div></div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                @if (session('success'))
                    <div class="alert alert-success"><strong>Success! </strong>{{ session('success') }}</div>
                @endif
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            <span class="sr-only">Tutup</span>
                        </button>
                        <strong>Oops!</strong> Semua harus diisi, berikut kolom yang belum terisi:
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Akun</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                            @method('put')
                            @csrf
                            <input type="hidden" name="role" value="{{ $user->role }}">
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label>Nama</label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ $user->name }}">
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
                                <div class="form-group col-md-6 col-12">
                                    <label>Email</label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="name@example.com" value="{{ $user->email }}" readonly>
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
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6 col-12">
                                    <label for="password">Kata Sandi</label>
                                        <div class="input-group">
                                            <input type="password" id="password" name="password" data-toggle="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Kata Sandi" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">
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

                                <div class="form-group col-md-6 col-12">
                                  <label for="password-confirm">Konfirmasi Kata Sandi</label>
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" data-toggle="password" placeholder="Konfirmasi Kata Sandi" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2">
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
                                    <input type="hidden" id="role" name="role" class="form-control @error('role') is-invalid @enderror" value="{{ $user->role }}">
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
                            </div>
                            <div class="float-right">
                                <div class="form-group">
                                    <label for=""></label>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Biodata</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employees.update', $user->employee->id) }}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="status" value="{{ $user->employee->status }}">
                            <input type="hidden" name="code" value="{{ $user->employee->code }}">
                            <input type="hidden" name="basic_salary" value="{{ $user->employee->basic_salary }}">
                            <input type="hidden" name="part_id" value="{{ $user->employee->part_id }}">
                            <input type="hidden" name="position_id" value="{{ $user->employee->position_id }}">
                            <input type="hidden" name="start_contract" value="{{ $user->employee->start_contract }}">
                            <input type="hidden" name="end_of_contract" value="{{ $user->employee->end_of_contract }}">
                            <div class="form-group">
                                <label for="name">Nama <span class="text-danger">*</span></label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $user->employee->name) }}" required autocomplete="name">
                                @if (count($errors) > 0)
                                    @error('name')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                @else
                                    <div class="invalid-feedback">
                                        Please fill in your name
                                    </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id_card_number">Nomor KTP <span class="text-danger">*</span></label>
                                        <input id="id_card_number" type="text" class="form-control @error('id_card_number') is-invalid @enderror" name="id_card_number" value="{{ old('id_card_number', $user->employee->id_card_number) }}" required autocomplete="id_card_number" placeholder="Contoh: 3402164108967003">
                                        @if (count($errors) > 0)
                                            @error('id_card_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your id card number
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="tax_number">NPWP <span class="text-danger">*</span></label>
                                        <input id="tax_number" type="text" class="form-control @error('tax_number') is-invalid @enderror" name="tax_number" value="{{ old('tax_number', $user->employee->tax_number) }}" required autocomplete="tax_number" placeholder="Contoh: 3402164108967003">
                                        @if (count($errors) > 0)
                                            @error('tax_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your tax number
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="place_of_birth">Tempat Lahir <span class="text-danger">*</span></label>
                                        <input id="place_of_birth" type="text" class="form-control @error('place_of_birth') is-invalid @enderror" name="place_of_birth" value="{{ old('place_of_birth', $user->employee->place_of_birth) }}" required autocomplete="place_of_birth">
                                        @if (count($errors) > 0)
                                            @error('place_of_birth')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your place of birth
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="date_of_birth">Tanggal Lahir <span class="text-danger">*</span></label>
                                        <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth', $user->employee->date_of_birth) }}" required autocomplete="date_of_birth">
                                        @if (count($errors) > 0)
                                            @error('date_of_birth')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your date of birth
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email <span class="text-danger">*</span></label>
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $user->employee->email) }}" required autocomplete="email">
                                        @if (count($errors) > 0)
                                            @error('email')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your email
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Nomor Telepon / WhatsApp <span class="text-danger">*</span></label>
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $user->employee->phone) }}" required autocomplete="phone">
                                        @if (count($errors) > 0)
                                            @error('phone')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your phone number
                                            </div>
                                        @endif
                                    </div>

                                </div>
                                <div class="col-6">


                                    <div class="form-group">
                                        <label for="education">Pendidikan <span class="text-danger">*</span></label>
                                        <select id="education" type="text" class="form-control select2 @error('education') is-invalid @enderror" name="education" value="{{ old('education', $user->employee->education) }}" required autocomplete="education">
                                            <option value="" disabled selected>--- Pilih Pendidikan ---</option>
                                            <option value="SMA" @if(old('education', $user->employee->education) == 'SMA')selected @endif>SMA</option>
                                            <option value="SMK" @if(old('education', $user->employee->education) == 'SMK')selected @endif>SMK</option>
                                            <option value="D3" @if(old('education', $user->employee->education) == 'D3')selected @endif>D3</option>
                                            <option value="D4" @if(old('education', $user->employee->education) == 'D4')selected @endif>D4</option>
                                            <option value="S1" @if(old('education', $user->employee->education) == 'S1')selected @endif>S1</option>
                                            <option value="S2" @if(old('education', $user->employee->education) == 'S2')selected @endif>S2</option>
                                            <option value="S3" @if(old('education', $user->employee->education) == 'S3')selected @endif>S3</option>
                                        </select>
                                        @if (count($errors) > 0)
                                            @error('education')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your education
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="bank">Nama Bank <span class="text-danger">*</span></label>
                                        <select id="bank" type="text" class="form-control select2 @error('bank') is-invalid @enderror" name="bank" value="{{ old('bank', $user->employee->bank) }}" required autocomplete="bank">
                                            <option value="" disabled selected>--- Pilih Bank ---</option>

                                            <option value="BCA" @if(old('bank', $user->employee->bank) == 'BCA')selected @endif>BCA</option>
                                            <option value="BRI" @if(old('bank', $user->employee->bank) == 'BRI')selected @endif>BRI</option>
                                            <option value="Mandiri" @if(old('bank', $user->employee->bank) == 'Mandiri')selected @endif>Mandiri</option>
                                            <option value="BNI" @if(old('bank', $user->employee->bank) == 'BNI')selected @endif>BNI</option>
                                            <option value="BSI" @if(old('bank', $user->employee->bank) == 'BSI')selected @endif>BSI</option>
                                        </select>
                                        @if (count($errors) > 0)
                                            @error('bank')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your bank name
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="account_number">Nomor Rekening <span class="text-danger">*</span></label>
                                        <input id="account_number" type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number', $user->employee->account_number) }}" required autocomplete="account_number">
                                        @if (count($errors) > 0)
                                            @error('account_number')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your account number
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="religion" class="form-label">Agama <span class="text-danger">*</span></label>
                                        <select id="religion" type="text" class="form-control select2 @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion', $user->employee->religion) }}" required autocomplete="religion">
                                            <option value="" disabled selected>--- Pilih Agama ---</option>
                                            <option value="Islam" @if(old('religion', $user->employee->religion) == 'Islam')selected @endif>Islam</option>
                                            <option value="Kristen Protestan" @if(old('religion', $user->employee->religion) == 'Kristen Protestan')selected @endif>Kristen Protestan</option>
                                            <option value="Kristen Katolik" @if(old('religion', $user->employee->religion) == 'Kristen Katolik')selected @endif>Kristen Katolik</option>
                                            <option value="Hindu" @if(old('religion', $user->employee->religion) == 'Hindu')selected @endif>Hindu</option>
                                            <option value="Buddha" @if(old('religion', $user->employee->religion) == 'Buddha')selected @endif>Buddha</option>
                                            <option value="Konghucu" @if(old('religion', $user->employee->religion) == 'Konghucu')selected @endif>Konghucu</option>
                                        </select>
                                        @if (count($errors) > 0)
                                            @error('religion')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your religion
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="marital_status">Status Perkawinan <span class="text-danger">*</span></label>
                                        <select id="marital_status" type="text" class="form-control select2 @error('marital_status') is-invalid @enderror" name="marital_status" required autocomplete="marital_status">
                                            <option value="" disabled selected>--- Pilih Status ---</option>
                                            <option value="Lajang" {{ old('marital_status', $user->employee->marital_status) == 'Lajang' ? 'selected' : '' }}>Lajang</option>
                                            <option value="Menikah" {{ old('marital_status', $user->employee->marital_status) == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                            <option value="Duda/Janda" {{ old('marital_status', $user->employee->marital_status) == 'Duda/Janda' ? 'selected' : '' }}>Duda/Janda</option>
                                        </select>
                                        @if (count($errors) > 0)
                                            @error('marital_status')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your marital status
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="dependents_count">Jumlah Tanggungan <span class="text-danger">*</span></label>
                                        <input id="dependents_count" type="number" class="form-control @error('dependents_count') is-invalid @enderror" name="dependents_count" value="{{ old('dependents_count', $user->employee->dependents_count) }}" placeholder="Contoh: 0 (ketik 1 jika ada anak 1, cukup angka saja)" required>
                                        @if (count($errors) > 0)
                                            @error('dependents_count')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your dependents count
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="address">Alamat Lengkap <span class="text-danger">*</span></label>
                                <textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror" name="address" style="width: 100%; height: 100px; resize:none" required autocomplete="address">{{ old('address', $user->employee->address) }}</textarea>
                                @if (count($errors) > 0)
                                    @error('address')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                @else
                                    <div class="invalid-feedback">
                                        Please fill in your address
                                    </div>
                                @endif
                            </div>
                            <div class="float-right">
                                <div class="form-group">
                                    <label for=""></label>
                                    <button class="btn btn-primary">Simpan</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('script-libraies')
<script src="{{ asset('assets/css/select2/dist/js/select2.full.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('script')
<script src="{{ asset('assets/js/bootstrap-show-password.js') }}"></script>
@endsection
