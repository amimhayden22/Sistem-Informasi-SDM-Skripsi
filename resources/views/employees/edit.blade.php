@extends('dashboard-layouts.app')
@section('title')
Form Edit Karyawan
@endsection
@section('style-libraries')
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('employees.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Form Edit Karyawan</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dasbor</a></div>
            <div class="breadcrumb-item"><a href="{{ route('employees.index') }}">Manajemen Karyawan</a></div>
            <div class="breadcrumb-item">Form Edit Karyawan</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Form Edit Karyawan</h2>
        <p class="section-lead">
            Yang memiliki tanda <span class="text-danger">*</span> wajib diisi!
        </p>

        @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                <strong>Success!</strong> {{ Session('success') }}.
            </div>
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

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Form</h4>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('employees.update', $employee->id) }}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <input id="code" type="hidden" class="form-control @error('code') is-invalid @enderror" name="code" required autocomplete="code" readonly="" value="{{ $employee->code }}">

                                    <div class="form-group">
                                        <label for="name">Nama <span class="text-danger">*</span></label>
                                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $employee->name) }}" required autocomplete="name" placeholder="Contoh: Gus Khamim">
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

                                    <div class="form-group">
                                        <label for="id_card_number">Nomor KTP <span class="text-danger">*</span></label>
                                        <input id="id_card_number" type="text" class="form-control @error('id_card_number') is-invalid @enderror" name="id_card_number" value="{{ old('id_card_number', $employee->id_card_number) }}" required autocomplete="id_card_number" placeholder="Contoh: 3402164108967003">
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
                                        <input id="tax_number" type="text" class="form-control @error('tax_number') is-invalid @enderror" name="tax_number" value="{{ old('tax_number', $employee->tax_number) }}" required autocomplete="tax_number" placeholder="Contoh: 3402164108967003">
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
                                        <input id="place_of_birth" type="text" class="form-control @error('place_of_birth') is-invalid @enderror" name="place_of_birth" value="{{ old('place_of_birth', $employee->place_of_birth) }}" required autocomplete="place_of_birth" placeholder="Contoh: Yogyakarta">
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
                                        <input id="date_of_birth" type="text" class="form-control datepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth', $employee->date_of_birth) }}" placeholder="Contoh: 2019-05-01 (format: yyyy-mm-dd)" required>
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
                                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $employee->email) }}" required autocomplete="email" placeholder="Contoh: info@sadasa.id">
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
                                        <label for="basic_salary">Gaji Pokok <span class="text-danger">*</span></label>
                                        <input id="basic_salary" type="text" class="form-control @error('basic_salary') is-invalid @enderror" name="basic_salary" value="{{ old('basic_salary', $employee->basic_salary) }}" required autocomplete="basic_salary" placeholder="Contoh: 5000000">
                                        @if (count($errors) > 0)
                                            @error('basic_salary')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your basic salary
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="phone">Nomor Telepon / WhatsApp <span class="text-danger">*</span></label>
                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone', $employee->phone) }}" required autocomplete="phone" placeholder="Contoh: 6285869289987">
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

                                    <div class="form-group">
                                        <label for="religion" class="form-label">Agama <span class="text-danger">*</span></label>
                                        <select id="religion" type="text" class="form-control @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion') }}" required autocomplete="religion">
                                            <option value="" disabled selected>--- Pilih Agama ---</option>
                                            <option value="Islam" {{ old('religion', $employee->religion) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                            <option value="Kristen Protestan" {{ old('religion', $employee->religion) == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
                                            <option value="Kristen Katolik" {{ old('religion', $employee->religion) == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
                                            <option value="Hindu" {{ old('religion', $employee->religion) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                            <option value="Buddha" {{ old('religion', $employee->religion) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                            <option value="Konghucu" {{ old('religion', $employee->religion) == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
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
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="education" class="form-label">Pendidikan <span class="text-danger">*</span></label>
                                        <select id="education" type="text" class="form-control @error('education') is-invalid @enderror" name="education" value="{{ old('education') }}" required autocomplete="education">
                                            <option value="" disabled selected>--- Pilih Pendidikan ---</option>
                                            <option value="SMA" {{ old('education', $employee->education) == 'SMA' ? 'selected' : '' }}>SMA</option>
                                            <option value="SMK" {{ old('education', $employee->education) == 'SMK' ? 'selected' : '' }}>SMK</option>
                                            <option value="D3" {{ old('education', $employee->education) == 'D3' ? 'selected' : '' }}>D3</option>
                                            <option value="D4" {{ old('education', $employee->education) == 'D4' ? 'selected' : '' }}>D4</option>
                                            <option value="S1" {{ old('education', $employee->education) == 'S1' ? 'selected' : '' }}>S1</option>
                                            <option value="S2" {{ old('education', $employee->education) == 'S2' ? 'selected' : '' }}>S2</option>
                                            <option value="S3" {{ old('education', $employee->education) == 'S3' ? 'selected' : '' }}>S3</option>
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
                                        <select id="bank" type="text" class="form-control @error('bank') is-invalid @enderror" name="bank" required autocomplete="bank">
                                            <option value="" disabled selected>--- Pilih Bank ---</option>
                                            <option value="BCA" {{ old('bank', $employee->bank) == 'BCA' ? 'selected' : '' }}>BCA</option>
                                            <option value="BRI" {{ old('bank', $employee->bank) == 'BRI' ? 'selected' : '' }}>BRI</option>
                                            <option value="Mandiri" {{ old('bank', $employee->bank) == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
                                            <option value="BNI" {{ old('bank', $employee->bank) == 'BNI' ? 'selected' : '' }}>BNI</option>
                                            <option value="BSI" {{ old('bank', $employee->bank) == 'BSI' ? 'selected' : '' }}>BSI</option>
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
                                        <input id="account_number" type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number', $employee->account_number) }}" required autocomplete="account_number" placeholder="Contoh: 7351420974">
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
                                        <label for="part_id" class="form-label">Bagian <span class="text-danger">*</span></label>
                                        <select id="part_id" type="text" class="form-control @error('part_id') is-invalid @enderror partName" name="part_id" required autocomplete="part_id">
                                            <option value="" disabled selected>--- Pilih Bagian ---</option>
                                            @foreach ($parts as $part)
                                                <option value="{{ $part->id }}" {{ old('part_id', $employee->part_id) == $part->id ? 'selected' : '' }}>{{$part->name}}</option>
                                            @endforeach
                                        </select>
                                        @if (count($errors) > 0)
                                            @error('part_id')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your part
                                            </div>
                                        @endif
                                        <div class="form-group mt-4">
                                            <label for="position_id" class="form-label">Jabatan<span class="text-danger"> *</span></label>
                                            <select class="form-control @error('position_id') is-invalid @enderror position_id" name="position_id" value="{{ old('position_id') }}" required autocomplete="position_id" id="position_id">
                                                <option value="" selected disabled>Nama Jabatan</option>
                                            </select>
                                            @if (count($errors) > 0)
                                                @error('position_id')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            @else
                                                <div class="invalid-feedback">
                                                    Please fill in your position
                                                </div>
                                            @endif
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="start_contract">Mulai Kontrak <span class="text-danger">*</span></label>
                                        <input id="start_contract" type="text" class="form-control datepicker @error('start_contract') is-invalid @enderror" name="start_contract" value="{{ old('start_contract', $employee->start_contract) }}" placeholder="Contoh: 2019-05-01 (format: yyyy-mm-dd)" required autocomplete="start_contract">
                                        @if (count($errors) > 0)
                                            @error('start_contract')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your start contract date
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="end_of_contract">Selesai Kontrak <span class="text-danger">*</span></label>
                                        <input id="end_of_contract" type="text" class="form-control datepicker @error('end_of_contract') is-invalid @enderror" name="end_of_contract" value="{{ old('end_of_contract', $employee->end_of_contract) }}" placeholder="Contoh: 2019-05-01 (format: yyyy-mm-dd)" required autocomplete="end_of_contract">
                                        @if (count($errors) > 0)
                                            @error('end_of_contract')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        @else
                                            <div class="invalid-feedback">
                                                Please fill in your end of contract date
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <label for="marital_status">Status Perkawinan <span class="text-danger">*</span></label>
                                        <select id="marital_status" type="text" class="form-control @error('marital_status') is-invalid @enderror" name="marital_status" required autocomplete="marital_status">
                                            <option value="" disabled selected>--- Pilih Status ---</option>
                                            <option value="Lajang" {{ old('marital_status', $employee->marital_status) == 'Lajang' ? 'selected' : '' }}>Lajang</option>
                                            <option value="Menikah" {{ old('marital_status', $employee->marital_status) == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                            <option value="Duda/Janda" {{ old('marital_status', $employee->marital_status) == 'Duda/Janda' ? 'selected' : '' }}>Duda/Janda</option>
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
                                        <input id="dependents_count" type="number" class="form-control @error('dependents_count') is-invalid @enderror" name="dependents_count" value="{{ old('dependents_count', $employee->dependents_count) }}" placeholder="Contoh: 0 (ketik 1 jika ada anak 1, cukup angka saja)" required>
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
                                <textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror" style="width: 100%; height: 100px; resize:none" name="address" required autocomplete="address" placeholder="Contoh: Jl. Sagan GK. V No.900, Terban, Kec. Gondokusuman">{{ old('address', $employee->address) }} </textarea>
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

                            <div class="form-group">
                                <label>Tanda Tangan dengan Cap Sadasa</label> @if($employee->signature_file) <a href='javascript:void(0)' data-toggle='tooltip' title='File Sudah Ada'><i class='fas fa-check-circle' style='color: #0095f6'></i></a> @endif
                                <input type="file" class="form-control @error('signature_file') is-invalid @enderror" id="signature_file" name="signature_file">
                                <small class="form-text text-muted">File harus berformat png dan berukuran maksimal 2MB.</small>
                                @if (count($errors) > 0)
                                    @error('signature_file')
                                        <div class="invalid-feedback">
                                        {{ $message }}
                                        </div>
                                    @enderror
                                @else
                                    <div class="invalid-feedback">
                                        Please fill in your signature file.
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Scan KTP</label> @if($employee->id_card_file) <a href='javascript:void(0)' data-toggle='tooltip' title='File Sudah Ada'><i class='fas fa-check-circle' style='color: #0095f6'></i></a> @endif
                                <input type="file" class="form-control @error('id_card_file') is-invalid @enderror" id="id_card_file" name="id_card_file">
                                <small class="form-text text-muted">File harus berformat png, jpg, atau pdf dan berukuran maksimal 2MB.</small>
                                @if (count($errors) > 0)
                                    @error('id_card_file')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                @else
                                    <div class="invalid-feedback">
                                        Please fill in your id card file.
                                    </div>
                                @endif
                            </div>

                            <div class="form-group">
                                <label class="form-label" for="status">Status <span class="text-danger">*</span></label>
                                <div class="selectgroup w-100">
                                    <label class="selectgroup-item">
                                        <input type="radio" id="status" value="Active" class="selectgroup-input" name="status" {{ old('status', $employee->status) == 'Active' ? 'checked' : '' }} required>
                                        <span class="selectgroup-button" for="Active" value="Active" id="status" name="status">Aktif</span>
                                    </label>
                                    <label class="selectgroup-item">
                                        <input type="radio" id="status" value="Inactive" class="selectgroup-input" name="status" {{ old('status', $employee->status) == 'Inactive' ? 'checked' : '' }} required>
                                        <span class="selectgroup-button" for="Inactive" value="Inactive" id="status" name="status">Nonaktif</span>
                                    </label>
                                </div>
                                @if (count($errors) > 0)
                                    @error('status')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
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
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('script')
<script type="text/javascript">
    var oldPositionId = @json(old('position_id'));
    var currentPositionId = {{ $employee->position->id }};

    function fetchPosition() {
        var partId = $('.form-group .partName').val();
        var div = $('.form-group .partName').parent();
        var op = " ";

        $.ajax({
            type: "GET",
            url: "{!!URL::to('dashboard/postions/json')!!}",
            data: { 'id': partId },
            success: function(getPosition) {
                // op += '<option value="{{ $employee->position->id }}" selected>{{ $employee->position->name }}</option>';
                getPosition.forEach(function(position) {
                    op += '<option value="' + position.id + '" ' + (oldPositionId == position.id || currentPositionId == position.id ? 'selected' : '') + '>' + position.name + '</option>';
                });

                div.find('.position_id').html(" ");
                div.find('.position_id').append(op);
            },
            error: function() {
                alert('data tidak ditemukkan');
            }
        });
    }
    $(document).ready(function(){
        // Inisialisasi elemen-elemen yang sama
        var selectElements = ['#religion', '#education', '#bank', '#part_id', '#position_id', '#marital_status'];

        // Menerapkan select2 pada semua elemen yang sama
        selectElements.forEach(function(element) {
            $(element).select2();
        });

        // Inisialisasi elemen tanggal yang sama
        var datepickerElements = ["#date_of_birth", "#start_contract", "#end_of_contract"];

        // Menerapkan datepicker pada semua elemen tanggal yang sama
        datepickerElements.forEach(function(element) {
            $(element).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });

        fetchPosition();

        $(document).on('change', '.form-group .partName', function() {
            fetchPosition();
        });
    });
</script>
@endsection
