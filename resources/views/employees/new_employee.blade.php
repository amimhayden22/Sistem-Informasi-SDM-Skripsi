@extends('auth-layouts.app')
@section('title')
    Formulir Karyawan Baru
@endsection
@section('style-libraies')
<link rel="stylesheet" href="{{ asset('assets/css/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
@endsection
@section('content')
<div class="container mt-5">
	<div class="row">
		<div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
			<div class="login-brand">
				<img src="{{ asset('assets/img/logo-sadasa-circle.png') }}" alt="logo" width="100" class="shadow-light rounded-circle">
			</div>
            @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                    <strong>Sukses!</strong> {{ Session('success') }}.
                </div>
            @endif
            <div class="card card-danger">
				<div class="card-header">
					<h4>Formulir Karyawan Baru</h4>
				</div>
				<div class="card-body">
					<form method="POST" action="{{ route('employees.storeWithoutAuth') }}" class="needs-validation" novalidate="" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama <span class="text-danger">*</span></label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" placeholder="Contoh: Gus Khamim">
                            @if (count($errors) > 0)
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            @else
                                <div class="invalid-feedback"> Please fill in your name </div>
                            @endif
                        </div>
                        <div class="row">
							<div class="col-sm">
								<input id="code" type="hidden" class="form-control @error('code') is-invalid @enderror" name="code" autocomplete="code" readonly="" value="{{ 'SDS'.'-'.$generateNumber }}">
								<div class="form-group">
									<label for="id_card_number">Nomor KTP <span class="text-danger">*</span></label>
									<input id="id_card_number" type="text" class="form-control @error('id_card_number') is-invalid @enderror" name="id_card_number" value="{{ old('id_card_number') }}" required autocomplete="id_card_number" placeholder="Contoh: 3402164108967003">
                                    @if (count($errors) > 0)
                                        @error('id_card_number')
                                            <div class="invalid-feedback">
										        {{ $message }}
                                            </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback"> Please fill in your id card number </div>
                                    @endif
								</div>
                                <div class="form-group">
                                    <label for="tax_number">NPWP <span class="text-danger">*</span></label>
                                    <input id="tax_number" type="text" class="form-control @error('tax_number') is-invalid @enderror" name="tax_number" value="{{ old('tax_number') }}" required autocomplete="tax_number" placeholder="Contoh: 3402164108967003">
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
									<input id="place_of_birth" type="text" class="form-control @error('place_of_birth') is-invalid @enderror" name="place_of_birth" value="{{ old('place_of_birth') }}" required autocomplete="place_of_birth" placeholder="Contoh: Yogyakarta">
                                    @if (count($errors) > 0)
                                        @error('place_of_birth')
                                            <div class="invalid-feedback">
										        {{ $message }}
									        </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback"> Please fill in your place of birth </div>
                                    @endif
								</div>
								<div class="form-group">
									<label for="date_of_birth">Tanggal Lahir <span class="text-danger">*</span></label>
									<input id="date_of_birth" type="text" class="form-control datepicker @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="Contoh: 2019-05-01 (format: yyyy-mm-dd)" required>
                                    @if (count($errors) > 0)
                                        @error('date_of_birth')
                                            <div class="invalid-feedback">
										        {{ $message }}
									        </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback"> Please fill in your date of birth </div>
                                    @endif
								</div>
								<div class="form-group">
									<label for="email">Email <span class="text-danger">*</span></label>
									<input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Contoh: info@sadasa.id">
                                    @if (count($errors) > 0)
                                        @error('email')
                                            <div class="invalid-feedback">
										        {{ $message }}
									        </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback"> Please fill in your email </div>
                                    @endif
								</div>
                                <div class="form-group">
									<label for="phone">Nomor Telepon / WhatsApp <span class="text-danger">*</span></label>
									<input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" placeholder="Contoh: 6285869289987">
                                    @if (count($errors) > 0)
                                        @error('phone')
                                            <div class="invalid-feedback">
										        {{ $message }}
									        </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback"> Please fill in your phone number </div>
                                    @endif
								</div>
							</div>
							<div class="col-sm">
								<div class="form-group">
									<label for="education" class="form-label">Pendidikan <span class="text-danger">*</span></label>
									<select id="education" type="text" class="form-control select2 @error('education') is-invalid @enderror" name="education" value="{{ old('education') }}" required autocomplete="education">
										<option value="" disabled selected>--- Pilih Pendidikan ---</option>
										<option value="SMA" {{ old('education') == 'SMA' ? 'selected' : '' }}>SMA</option>
										<option value="SMK" {{ old('education') == 'SMK' ? 'selected' : '' }}>SMK</option>
										<option value="D3" {{ old('education') == 'D3' ? 'selected' : '' }}>D3</option>
										<option value="D4" {{ old('education') == 'D4' ? 'selected' : '' }}>D4</option>
										<option value="S1" {{ old('education') == 'S1' ? 'selected' : '' }}>S1</option>
										<option value="S2" {{ old('education') == 'S2' ? 'selected' : '' }}>S2</option>
										<option value="S3" {{ old('education') == 'S3' ? 'selected' : '' }}>S3</option>
									</select>
                                    @if (count($errors) > 0)
                                        @error('education')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback"> Please fill in your education </div>
                                    @endif
								</div>
								<div class="form-group">
									<label for="bank">Nama Bank <span class="text-danger">*</span></label>
									<select id="bank" type="text" class="form-control select2 @error('bank') is-invalid @enderror" name="bank" required autocomplete="bank">
										<option value="" disabled selected>--- Pilih Bank ---</option>
										<option value="BCA" {{ old('bank') == 'BCA' ? 'selected' : '' }}>BCA</option>
										<option value="BRI" {{ old('bank') == 'BRI' ? 'selected' : '' }}>BRI</option>
										<option value="Mandiri" {{ old('bank') == 'Mandiri' ? 'selected' : '' }}>Mandiri</option>
										<option value="BNI" {{ old('bank') == 'BNI' ? 'selected' : '' }}>BNI</option>
										<option value="BSI" {{ old('bank') == 'BSI' ? 'selected' : '' }}>BSI</option>
									</select>
                                    @if (count($errors) > 0)
                                        @error('bank')
                                            <div class="invalid-feedback">
										        {{ $message }}
									        </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback"> Please fill in your bank name </div>
                                    @endif
								</div>
								<div class="form-group">
									<label for="account_number">Nomor Rekening <span class="text-danger">*</span></label>
									<input id="account_number" type="text" class="form-control @error('account_number') is-invalid @enderror" name="account_number" value="{{ old('account_number') }}" required autocomplete="account_number" placeholder="Contoh: 7351420974">
                                    @if (count($errors) > 0)
                                        @error('account_number')
                                            <div class="invalid-feedback">
										        {{ $message }}
									        </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback"> Please fill in your account number </div>
                                    @endif
								</div>
								<div class="form-group">
									<label for="religion" class="form-label">Agama <span class="text-danger">*</span></label>
									<select id="religion" type="text" class="form-control select2 @error('religion') is-invalid @enderror" name="religion" value="{{ old('religion') }}" required autocomplete="religion">
										<option value="" disabled selected>--- Pilih Agama ---</option>
										<option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
										<option value="Kristen Protestan" {{ old('religion') == 'Kristen Protestan' ? 'selected' : '' }}>Kristen Protestan</option>
										<option value="Kristen Katolik" {{ old('religion') == 'Kristen Katolik' ? 'selected' : '' }}>Kristen Katolik</option>
										<option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
										<option value="Buddha" {{ old('religion') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
										<option value="Konghucu" {{ old('religion') == 'Konghucu' ? 'selected' : '' }}>Konghucu</option>
									</select>
                                    @if (count($errors) > 0)
                                        @error('religion')
                                            <div class="invalid-feedback">
										        {{ $message }}
									        </div>
                                        @enderror
                                    @else
                                        <div class="invalid-feedback"> Please fill in your religion </div>
                                    @endif
								</div>
                                <div class="form-group">
                                    <label for="marital_status">Status Perkawinan <span class="text-danger">*</span></label>
                                    <select id="marital_status" type="text" class="form-control select2 @error('marital_status') is-invalid @enderror" name="marital_status" required autocomplete="marital_status">
                                        <option value="" disabled selected>--- Pilih Status ---</option>
                                        <option value="Lajang" {{ old('marital_status') == 'Lajang' ? 'selected' : '' }}>Lajang</option>
                                        <option value="Menikah" {{ old('marital_status') == 'Menikah' ? 'selected' : '' }}>Menikah</option>
                                        <option value="Duda/Janda" {{ old('marital_status') == 'Duda/Janda' ? 'selected' : '' }}>Duda/Janda</option>
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
                                    <input id="dependents_count" type="number" class="form-control @error('dependents_count') is-invalid @enderror" name="dependents_count" value="{{ old('dependents_count') }}" placeholder="Contoh: 0 (ketik 1 jika ada anak 1, cukup angka saja)" required>
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
								<input type="hidden" id="status" value="Active" name="status">
							</div>
						</div>
						<div class="form-group">
							<label for="address">Alamat Lengkap <span class="text-danger">*</span></label>
							<textarea id="address" type="text" class="form-control @error('address') is-invalid @enderror" style="width: 100%; height: 100px; resize:none" name="address" value="{{ old('address') }}" required autocomplete="address" placeholder="Contoh: Jl. Sagan GK. V No.900, Terban, Kec. Gondokusuman">{{Request::old('address')}}</textarea>
                            @if (count($errors) > 0)
                                @error('address')
                                    <div class="invalid-feedback">
								        {{ $message }}
							        </div>
                                @enderror
                            @else
                                <div class="invalid-feedback"> Please fill in your address </div>
                            @endif
						</div>
                        <div class="form-group">
                            <label>Scan KTP <span class="text-danger">*</span></label>
                            <input type="file" class="form-control @error('id_card_file') is-invalid @enderror" id="id_card_file" name="id_card_file" required>
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
							<button type="submit" class="btn btn-danger btn-lg btn-block"> Simpan </button>
						</div>
					</form>
				</div>
			</div>
			<div class="simple-footer"> Copyright &copy; Sadasa Academy {{ date('Y') }}</div>
		</div>
	</div>
</div>
@endsection
@section('script-libraies')
<script src="{{ asset('assets/css/select2/dist/js/select2.full.min.js') }}"></script>
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.11.2/jquery.mask.min.js" integrity="sha512-Y/GIYsd+LaQm6bGysIClyez2HGCIN1yrs94wUrHoRAD5RSURkqqVQEU6mM51O90hqS80ABFTGtiDpSXd2O05nw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('#date_of_birth').datepicker({
            dateFormat: "yy-mm-dd"
        });
    });
</script>
@endsection
