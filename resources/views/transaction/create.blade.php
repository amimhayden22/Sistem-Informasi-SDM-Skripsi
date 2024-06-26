@extends('dashboard-layouts.app')
@section('title')
    Tambah Izin Kerja
@endsection
@section('style-libraries')
<link rel="stylesheet" href="{{ asset('assets/css/select2/dist/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/signature/jquery.signature.css') }}">
@endsection
@section('style')
<style>
  .kbw-signature { width: 100%; height: 200px; padding: 2px; border: 1px solid #e4e6fc; background-color: #fdfdff; border-radius: 10px;}
  #sig canvas{
      width: 100% !important;
      height: auto;
  }
</style>
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('work-permit.store') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Form Pengajuan Izin Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dasbor</a></div>
            <div class="breadcrumb-item"><a href="{{ route('work-permit.index') }}">Pengajuan Izin Kerja</a></div>
            <div class="breadcrumb-item">Form Pengajuan Izin Kerja</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Form Pengajuan Izin Kerja</h2>
        <p class="section-lead">
            Yang memiliki tanda <span class="text-danger">*</span> wajib diisi!
        </p>

        @if (session('message'))
            <div class="alert alert-success"><strong>Success! </strong>{{ session('message') }}</div>
        @endif

        @if (Session::has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Tutup</span>
            </button>
            <strong>Error!</strong> {{ Session('error') }}
        </div>
        @endif

        @if (Session::has('info'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Tutup</span>
            </button>
            <strong>Peringatan!</strong> {{ Session('info') }}
        </div>
        @endif

        <div class="card">
            <div class="card-header">
              <h4>Form</h4>
            </div>

            <div class="card-body">
                <form action="{{ route('work-permit.store') }}" method="POST" id="create-transaction" class="needs-validation" novalidate="" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="form-label">Nama</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ Auth::user()->employee->name }}" readonly>
                        @if (count($errors) > 0)
                        @error('name')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">Bagian</label>
                        <input type="text" id="part" name="part" class="form-control @error('part') is-invalid @enderror" value="{{ Auth::user()->employee->part->name }}" readonly>
                        @if (count($errors) > 0)
                        @error('part')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="form-label">Jabatan</label>
                        <input type="text" id="position" name="position" class="form-control @error('position') is-invalid @enderror" value="{{ Auth::user()->employee->position->name }}" readonly>
                        @if (count($errors) > 0)
                        @error('position')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                        @else
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Keperluan Izin Kerja untuk<span class="text-danger"> *</span></label>
                        <select id="for" type="text" class="form-control select2 @error('for') is-invalid @enderror select-for" name="for" value="{{ old('for') }}" required autocomplete="for">
                            <option value="" disabled selected>--- Pilih Keperluan Izin Kerja ---</option>
                            <option value="Izin" {{ old('for') == 'Izin' ? 'selected' : '' }}>Izin</option>
                            <option value="Sakit" {{ old('for') == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="Cuti" {{ old('for') == 'Cuti' ? 'selected' : '' }}>Cuti</option>
                        </select>
                        @if (count($errors) > 0)
                            @error('for')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        @else
                            <div class="invalid-feedback">
                                Please fill in your work permit requirements.
                            </div>
                        @endif
                    </div>

                    <div class="form-group" id="input-sub_permission">
                        <label>Rincian Izin Kerja</label>
                        <select id="sub_permission" type="text" class="form-control select2 @error('sub_permission') is-invalid @enderror select-sub_permission" name="sub_permission" value="{{ old('sub_permission') }}" autocomplete="sub_permission">
                            <option value="" disabled selected>--- Pilih rincian izin kerja  ---</option>
                            <option value="Perkawinan Pekerja Sendiri" {{ old('sub_permission') == 'Perkawinan Pekerja Sendiri' ? 'selected' : '' }}>Perkawinan Pekerja Sendiri (Total Hari: 3 Hari)</option>
                            <option value="Pembaptisan/khitanan anak sah Pekerja" {{ old('sub_permission') == 'Pembaptisan/khitanan anak sah Pekerja' ? 'selected' : '' }}>Pembaptisan/khitanan anak sah Pekerja (Total Hari: 2 Hari)</option>
                            <option value="Perkawinan anak sah Pekerja" {{ old('sub_permission') == 'Perkawinan anak sah Pekerja' ? 'selected' : '' }}>Perkawinan anak sah Pekerja (Total Hari: 2 Hari)</option>
                            <option value="Istri sah Pekerja melahirkan/gugur kandungan" {{ old('sub_permission') == 'Istri sah Pekerja melahirkan/gugur kandungan' ? 'selected' : '' }}>Istri sah Pekerja melahirkan/gugur kandungan (Total Hari: 2 Hari)</option>
                            <option value="Kematian suami/istri/anak/menantu/orang tua/mertua" {{ old('sub_permission') == 'Kematian suami/istri/anak/menantu/orang tua/mertua' ? 'selected' : '' }}>Kematian suami/istri/anak/menantu/orang tua/mertua (Total Hari: 2 Hari)</option>
                            <option value="Kematian kakak/adik kandung Pekerja/anggota Keluarga dalam satu rumah" {{ old('sub_permission') == 'Kematian kakak/adik kandung Pekerja/anggota Keluarga dalam satu rumah' ? 'selected' : '' }}>Kematian kakak/adik kandung Pekerja/anggota Keluarga dalam satu rumah (Total Hari: 2 Hari)</option>
                            <option value="Lainnya" {{ old('sub_permission') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        @if (count($errors) > 0)
                            @error('sub_permission')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        @else
                            <div class="invalid-feedback">
                                Please fill in your sub permission field.
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="leave_date">Tanggal Izin Kerja <span class="text-danger"> *</span></label>
                        <input type="date" id="leave_date" name="leave_date" class="form-control @error('leave_date') is-invalid @enderror" value="{{ old('leave_date') }}" required>
                        @if (count($errors) > 0)
                        @error('leave_date')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                        @else
                        <div class="invalid-feedback">
                            Please fill in your work permit date.
                        </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="return_date">Tanggal Kembali <span class="text-danger"> *</span></label>
                        <input type="date" id="return_date" min="{{ date('Y-m-d') }}" name="return_date" class="form-control @error('return_date') is-invalid @enderror" value="{{ old('return_date') }}" required>
                        @if (count($errors) > 0)
                            @error('return_date')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        @else
                            <div class="invalid-feedback">
                                Please fill in your return date.
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label>Alasan Izin Kerja<span class="text-danger"> *</span></label>
                        <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" style="width: 100%; height: 100px; resize:none" placeholder="Masukkan Alasan Izin Kerja" required>{{Request::old('description')}}</textarea>
                        @if (count($errors) > 0)
                        @error('description')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                        @else
                        <div class="invalid-feedback">
                            Please fill in your work permit description.
                        </div>
                        @endif
                    </div>

                    <div class="form-group" id="input-attachment">
                        <label>Lampiran</label>
                        <input type="file" class="form-control @error('attachment') is-invalid @enderror" id="attachment" name="attachment">
                        <small class="form-text text-muted">File harus berformat png, jpg, atau pdf dan berukuran maksimal 2MB.</small>
                        @if (count($errors) > 0)
                            @error('attachment')
                                <div class="invalid-feedback">
                                {{ $message }}
                                </div>
                            @enderror
                        @else
                            <div class="invalid-feedback">
                                Please fill in your work permit attachment.
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="hidden" id="status" name="status" class="form-control" value="Sedang Proses">
                    </div>

                    <div class="form-group">
                        <label>Tanda Tangan<span class="text-danger"> *</span></label>
                        <br/>
                        <div id="sig" class="@error('applicant_signature') border border-danger @enderror"></div>
                        <br/>
                        <textarea id="signature64" name="applicant_signature" class="form-control @error('applicant_signature') is-invalid @enderror" value="{{ old('applicant_signature') }}" style="display: none" required></textarea>
                        @if (count($errors) > 0)
                        @error('applicant_signature')
                            <div class="invalid-feedback">
                            {{ $message }}
                            </div>
                        @enderror
                        @else
                        <div class="invalid-feedback">
                            Please fill in your signature.
                        </div>
                        @endif
                        <button id="clear" class="btn btn-danger btn-sm mt-3"><i class="fas fa-eraser"></i> Hapus Tanda Tangan</button>
                    </div>

                    <div class="float-right">
                        <div class="form-group">
                            <label for=""></label>
                            <input type="button" class="btn btn-primary" id="btn-transaction" value="Buat"></input>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

</section>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Konfirmasi Mengajukan Izin Kerja!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <p>
                Apakah anda yakin akan mengajukan izin kerja? silakan periksa kembali apabila sudah benar lalu klik tombol <strong>Buat Izin Kerja</strong>.
            </p>
            <strong>Berikut Data Izin Kerja:</strong>
            <table>
                <tr><td>Nama</td><td>:</td><td> <span id="preview-name"></span></td></tr>
                <tr><td>Bagian</td><td>:</td><td> <span id="preview-part"></span></td></tr>
                <tr><td>Jabatan</td><td>:</td><td> <span id="preview-position"></span></td></tr>
                <tr><td>Tanggal Cuti</td><td>:</td><td> <span id="preview-leave_date"></span></td></tr>
                <tr><td>Tanggal Kembali</td><td>:</td><td> <span id="preview-return_date"></span></td></tr>
                <tr><td>Keperluan Izin Kerja Untuk</td><td>:</td><td> <span id="preview-for"></span></td></tr>
                <tr><td>Alasan Izin Kerja</td><td>:</td><td> <span id="preview-description"></span></td></tr>
                {{-- <tr><td>Tanda Tangan</td><td>:</td><td> <span id="preview-signature"></span></td></tr> --}}
            </table>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Periksa Kembali</button>
            <button type="submit" class="btn btn-primary" id="btn-transaction-submit">Buat Izin Kerja</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script-libraies')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="{{ asset('js/signature/jquery.signature.js') }}"></script>
<script src="{{ asset('js/signature/jquery.ui.touch-punch.min.js') }}"></script>
<script src="{{ asset('assets/css/select2/dist/js/select2.full.min.js') }}"></script>
@endsection
@section('script')
<script type="text/javascript">

    // hide attachment
    $('#input-attachment').hide();
    $('#for').change(function(){
        // console.log('hmm its change: ')
        if($('#for').val() === 'Izin' || $('#for').val() === 'Sakit'){
            $('#input-attachment').show();
        }else{
            $('#input-attachment').hide();
        }
    });

    // show sub permission
    $('#input-sub_permission').hide();
    $('#for').change(function(){
        // console.log('hmm its change: ')
        if($('#for').val() === 'Izin'){
            // console.log('aku memilih izin')
            $('#input-sub_permission').show();
            $('#sub_permission').change(function(){
                var subPermission = $('#sub_permission').val();
                var totalLeaveDay = 0;

                switch (subPermission) {
                    case 'Perkawinan Pekerja Sendiri':
                        totalLeaveDay = 3;
                        $('#leave_date').val('');
                        $('#return_date').val('');
                        $('#return_date').prop('readonly', true);
                        // console.log('Total Hari: '+totalLeaveDay);
                        break;
                    case 'Pembaptisan/khitanan anak sah Pekerja':
                        totalLeaveDay = 2;
                        $('#leave_date').val('');
                        $('#return_date').val('');
                        $('#return_date').prop('readonly', true);
                        // console.log('Total Hari: '+totalLeaveDay);
                        break;
                    case 'Perkawinan anak sah Pekerja':
                        totalLeaveDay = 2;
                        $('#leave_date').val('');
                        $('#return_date').val('');
                        $('#return_date').prop('readonly', true);
                        // console.log('Total Hari: '+totalLeaveDay);
                        break;
                    case 'Istri sah Pekerja melahirkan/gugur kandungan':
                        totalLeaveDay = 2;
                        $('#leave_date').val('');
                        $('#return_date').val('');
                        $('#return_date').prop('readonly', true);
                        // console.log('Total Hari: '+totalLeaveDay);
                        break;
                    case 'Kematian suami/istri/anak/menantu/orang tua/mertua':
                        totalLeaveDay = 2;
                        $('#leave_date').val('');
                        $('#return_date').val('');
                        $('#return_date').prop('readonly', true);
                        // console.log('Total Hari: '+totalLeaveDay);
                        break;
                    case 'Kematian kakak/adik kandung Pekerja/anggota Keluarga dalam satu rumah':
                        totalLeaveDay = 2;
                        $('#leave_date').val('');
                        $('#return_date').val('');
                        $('#return_date').prop('readonly', true);
                        // console.log('Total Hari: '+totalLeaveDay);
                        break;
                    default:
                        $('#leave_date').val('');
                        $('#return_date').val('');
                        $('#return_date').prop('readonly', false);
                        // console.log('aku tidak memilih apa-apa')
                        break;
                }
                $('#leave_date').change(function() {
                    function addWorkdays(date, days) {
                        const newDate = new Date(date);
                        let count = 0;

                        while (count < days) {
                            newDate.setDate(newDate.getDate() + 1);
                            const dayOfWeek = newDate.getDay();

                            if (dayOfWeek !== 0 && dayOfWeek !== 6) {
                            count++;
                            }
                        }

                        return newDate.toISOString().substring(0, 10);
                    }

                    const dateObj = new Date($('#leave_date').val());
                    const newDate = addWorkdays(dateObj, totalLeaveDay);
                    $('#return_date').val(newDate);
                });
                // if($('#sub_permission').val() === 'Perkawinan Pekerja Sendiri' || $('#sub_permission').val() === 'Pembaptisan/khitanan anak sah Pekerja' || $('#sub_permission').val() === 'Perkawinan anak sah Pekerja' || $('#sub_permission').val() === 'Istri sah Pekerja melahirkan/gugur kandungan' || $('#sub_permission').val() === 'Kematian suami/istri/anak/menantu/orang tua/mertua' || $('#sub_permission').val() === 'Kematian kakak/adik kandung Pekerja/anggota Keluarga dalam satu rumah'  ){
                //     console.log($('#sub_permission').val())
                // }else{
                //     console.log('aku tidak memilih apa-apa')
                // }
            });
        }else{
            // console.log('aku memilih sakit dan cuti')
            $('#leave_date').val('');
                $('#return_date').val('');
                $('#return_date').prop('readonly', false);
            $('#input-sub_permission').hide();
        }
    });

    var sig = $('#sig').signature({syncField: '#signature64', syncFormat: 'PNG'});
    $('#clear').click(function(e) {
        e.preventDefault();
        sig.signature('clear');
        $("#signature64").val('');
    });

    $('#btn-transaction').click(function(){
        $('#exampleModal').modal('show')
        $('#preview-name').text($('#name').val());
        $('#preview-part').text($('#part').val());
        $('#preview-position').text($('#position').val());
        $('#preview-leave_date').text($('#leave_date').val());
        $('#preview-return_date').text($('#return_date').val());
        $('#preview-description').text($('#description').val());
        $('#preview-signature').text($('#signature').val());
        $('#preview-for').text($('#for').val());
        $("#btn-transaction-submit").click(function(){
        $("#btn-transaction-submit").attr("disabled", true);
            $('#create-transaction').submit();
        });
    });
</script>
@if (count($errors) > 0)
    @error('attachment')
        <script type="text/javascript">
            $('#input-attachment').show();
        </script>
    @enderror
@endif
@endsection
