@extends('dashboard-layouts.app')
@section('title')
Manajemen Karyawan
@endsection
@section('style')
<link rel="stylesheet" href="{{ asset('assets/css/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">

<style>
    .bg-gray{
        background-color: rgba(0, 0, 0, 0.19);
    }
</style>
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <h1>Karyawan</h1>
        <div class="section-header-button">
            <a href="{{ route('employees.create') }}" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dasbor</a></div>
            <div class="breadcrumb-item">Manajemen Karyawan</div>
        </div>
    </div>
    <div class="section-body">
        <h2 class="section-title">Karyawan</h2>
        <p class="section-lead">
            Anda dapat mengelola semua data karyawan di sini, seperti tambah dan edit.
        </p>

        @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Sukses!</strong> {{ Session('success') }}.
        </div>
        @endif

        @if (Session::has('email'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                <span class="sr-only">Close</span>
            </button>
            <strong>Sukses!</strong> {{ Session('email') }}
        </div>
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

        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Data Karyawan</h4>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" id="table-1">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Jabatan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                @foreach ($employees as $employee)
                                <tr {{ $employee->status === 'Inactive' ? 'class=bg-gray' : '' }}>
                                    <td>{{ $loop->iteration }}</td>
                                    <td width="200"><a href="" data-toggle="modal" data-target="#exampleModal" class="detail-karyawan" data-id="{{ $employee->id }}"
                                        data-code="{{ $employee->code }}"
                                        data-name="{{ $employee->name }}"
                                        data-place_of_birth="{{ $employee->place_of_birth }}"
                                        data-date_of_birth="{{ date('d F Y', strtotime($employee->date_of_birth)) }}"
                                        data-id_card_number="{{ $employee->id_card_number }}"
                                        data-email="{{ $employee->email }}"
                                        data-address="{{ $employee->address }}"
                                        @if($employee->part_id)
                                        data-part_id="{{ $employee->part->name }}"
                                        @endif
                                        data-phone="{{ $employee->phone }}"
                                        data-religion="{{ $employee->religion }}"
                                        data-education="{{ $employee->education }}"
                                        data-bank="{{ $employee->bank }}"
                                        data-account_number="{{ $employee->account_number }}"
                                        data-signature="{{ $employee->signature_file }}"
                                        @if($employee->position_id)
                                        data-position="{{ $employee->position->name }}"
                                        @endif
                                        @if($employee->start_contract)
                                        data-start_contract="{{ date('d F Y', strtotime($employee->start_contract)) }}"
                                        @endif
                                        @if($employee->end_of_contract)
                                        data-end_of_contract="{{ date('d F Y', strtotime($employee->end_of_contract)) }}"
                                        @endif
                                        @if($employee->basic_salary)
                                        data-basic_salary="{{ number_format("$employee->basic_salary", 0, ",", ".") }}"
                                        @endif
                                        >{{ $employee->name }}
                                        @if ($employee->user_id)
                                        @if ($employee->status == 'Active')
                                        <i class="fas fa-check-circle" style="color: #0095f6"></i>
                                        @endif
                                        @endif
                                        @if ($employee->user_id)
                                        @if ($employee->status == 'Inactive')
                                        <i class="fas fa-check-circle" style="color: #666666"></i>
                                        @endif
                                        @endif
                                    </a></td>
                                    <td>{{ $employee->email }}</td>
                                    <td>@if($employee->position_id) {{ $employee->position->name }} @endif</td>
                                    <td>
                                        @php
                                            $startDate = \Carbon\Carbon::parse($employee->start_contract);
                                            $endDate = \Carbon\Carbon::now();

                                            $diff = $startDate->diff($endDate);

                                            $years = $diff->y;
                                            $months = $diff->m;
                                            $days = $diff->d;

                                            $status = "Aktif - $years Tahun, $months Bulan, $days Hari"
                                        @endphp
                                        {{ $employee->status === 'Active' ? $status : 'Nonaktif' }}
                                    </td>
                                    <td class="btn-group">
                                        <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-original-title="Edit Data"><i class="fas fa-pencil-alt" aria-hidden="true"></i></a>
                                        {{-- Hapus Data --}}
                                        <a href="#" class="btn btn-danger btn-sm"
                                        data-toggle="tooltip" data-original-title="Hapus Data"
                                        data-confirm="Hapus Karyawan|Apakah anda yakin ingin menghapus karyawan bernama:  <b>{{ $employee->name }}</b>?"
                                        data-confirm-yes="event.preventDefault();
                                        document.getElementById('delete-portofolio-{{ $employee->id }}').submit();"
                                        ><i class="fas fa-trash" aria-hidden="true"></i></a>
                                        <form id="delete-portofolio-{{ $employee->id }}" action="{{ route('employees.destroy', $employee->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('delete')
                                        </form>
                                        <a href="#" class="btn btn-info btn-sm {{ $employee->user_id ? 'disabled' : '' }}"
                                            data-toggle="tooltip" data-original-title="Kirim Informasi Akun Karyawan"
                                            onclick="event.preventDefault(); document.getElementById('send-email-{{ $employee->id }}').submit()">
                                            <i class="fas fa-paper-plane"></i></a>
                                            <form id="send-email-{{ $employee->id }}" action="{{ route('employees.send-email', $employee->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $employee->id }}">
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Detail Karyawan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table>
                            <tbody>
                                <tr><th>Kode Karyawan</th><td> : <span id="code"></span></td></tr>
                                <tr><th>Nama </th><td> : <span id="name"></span></td></tr>
                                <tr><th>Tempat Lahir </th><td> : <span id="place_of_birth"></span></td></tr>
                                <tr><th>Tanggal Lahir </th><td> : <span id="date_of_birth"></span></td></tr>
                                <tr><th>Nomor KTP </th><td> : <span id="id_card_number"></span></td></tr>
                                <tr><th>Email </th><td> : <span id="email"></span></td></tr>
                                <tr><th>Alamat </th><td> : <span id="address"></span></td></tr>
                                <tr><th>Bagian </th><td> : <span id="part_id"></span></td></tr>
                                <tr><th>Nomor Telepon/ WA </th><td> : <span id="phone"></span></td></tr>
                                <tr><th>Agama </th><td> : <span id="religion"></span></td></tr>
                                <tr><th>Pendidikan </th><td> : <span id="education"></span></td></tr>
                                <tr><th>Nama Bank </th><td> : <span id="bank"></span> - <span id="account_number"></span></td></tr>
                                <tr><th>Jabatan </th><td> : <span id="position"></span></td></tr>
                                <tr><th>Mulai Kontrak </th><td> : <span id="start_contract"></span></td></tr>
                                <tr><th>Selesai Kontrak </th><td> : <span id="end_of_contract"></span></td></tr>
                                <tr><th>Gaji </th><td> : Rp <span id="basic_salary"></span></td></tr>
                                <tr><th>Tanda Tangan</th><td>:</td></tr>
                                <tr><td><img src="" alt="Tanda Tangan" id="signature_file"></td></tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
                    </div>
                </div>
            </div>
        </div>
        @endsection
        @section('script-libraies')
        <script src="{{ asset('assets/js/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/css/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
        <script src="{{ asset('assets/css/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
        @endsection
        @section('script-page-specific')
        <script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
        @endsection
        @section('script')
        <script type="text/javascript">
            $(document).ready(function() {
                $(document).on('click', '.detail-karyawan', function() {
                    var code = $(this).data('code');
                    var name = $(this).data('name');
                    var place_of_birth = $(this).data('place_of_birth');
                    var date_of_birth = $(this).data('date_of_birth');
                    var id_card_number = $(this).data('id_card_number');
                    var email = $(this).data('email');
                    var address = $(this).data('address');
                    var part_id = $(this).data('part_id');
                    var phone = $(this).data('phone');
                    var religion = $(this).data('religion');
                    var education = $(this).data('education');
                    var bank = $(this).data('bank');
                    var account_number = $(this).data('account_number');
                    var position = $(this).data('position');
                    var start_contract = $(this).data('start_contract');
                    var end_of_contract = $(this).data('end_of_contract');
                    var basic_salary = $(this).data('basic_salary');
                    var signature = "{{ asset('backend/assets/img/employees/signature/') }}" + "/" + $(this).data('signature');
                    $('#code').text(code);
                    $('#name').text(name);
                    $('#place_of_birth').text(place_of_birth);
                    $('#date_of_birth').text(date_of_birth);
                    $('#id_card_number').text(id_card_number);
                    $('#email').text(email);
                    $('#address').text(address);
                    $('#part_id').text(part_id);
                    $('#phone').text(phone);
                    $('#religion').text(religion);
                    $('#education').text(education);
                    $('#bank').text(bank);
                    $('#account_number').text(account_number);
                    $('#position').text(position);
                    $('#start_contract').text(start_contract);
                    $('#end_of_contract').text(end_of_contract);
                    $('#basic_salary').text(basic_salary);
                    $('#signature_file').attr('src', ''+signature);
                })
            })
        </script>
        @endsection
