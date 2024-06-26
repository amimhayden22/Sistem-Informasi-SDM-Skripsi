@extends('dashboard-layouts.app')
@section('title')
Preview Izin Kerja
@endsection
@section('content')
<section class="section">
    <div class="section-header">
        <div class="section-header-back">
            <a href="{{ route('work-permit.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Detail Izin Kerja</h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="{{ url('/dashboard') }}">Dasbor</a></div>
            <div class="breadcrumb-item"><a href="{{ route('work-permit.index') }}">Pengajuan Izin Kerja</a></div>
            <div class="breadcrumb-item">Detail Izin Kerja</div>
        </div>
    </div>

    <div class="section-body">
        <h2 class="section-title">Izin Kerja <strong>{{ $transaction->employee->name }}</strong></h2>
        <p class="section-lead">Berikut adalah detail izin kerjanya:</p>

        <div class="row">
            <div class="col-12 col-sm-12 col-lg-7">
                <div class="card author-box card-danger">
                    <div class="card-body">
                        <div class="author-box-left">
                            <img alt="image" src="https://assets.sadasa.id/images/Logo-Round.svg" class="rounded-circle author-box-picture">
                            <div class="clearfix"></div>
                        </div>
                        <div class="author-box-details">
                            <div class="author-box-name">
                                <a href="#">{{ $transaction->employee->name }}</a>
                            </div>
                            <div class="author-box-job">{{ $transaction->employee->position->name }}</div>
                            <div class="author-box-description">
                                <table>
                                    <tr style="text-align: left;"><th>Izin Kerja Untuk</th><td>:</td><td>{{ $transaction->for }}</td></tr>
                                    @if ($transaction->sub_permission)
                                    <tr style="text-align: left;"><th>Rincian Izin Kerja</th><td>:</td><td>{{ $transaction->sub_permission }}</td></tr>
                                    @endif
                                    <tr style="text-align: left;"><th>Keperluan Kerja</th><td>:</td><td>{{ $transaction->description }}</td></tr>
                                    <tr style="text-align: left;"><th>Tanggal Izin Kerja</th><td>:</td><td>{{ date('d F Y', strtotime($transaction->leave_date)) }}</td></tr>
                                    <tr style="text-align: left;"><th>Tanggal Kembali</th><td>:</td><td>{{ date('d F Y', strtotime($transaction->return_date)) }}</td></tr>
                                    @if ($transaction->attachment)
                                        <tr style="text-align: left;"><th>Lampiran</th><td>:</td><td><a href="{{ asset('images/attachment/'. $transaction->attachment) }}" target="_BLANK">Klik di sini</a></td></tr>
                                    @endif
                                    <tr style="text-align: left;"><th>Status</th><td>:</td><td>{{ $transaction->status }}</td></tr>
                                </table>
                            </div>
                            <div class="w-100 d-sm-none"></div>
                            <div class="float-right mt-sm-0 mt-3">
                                @if(Auth::user()->employee->position->name == 'Business Admin and General Affair')
                                    <a href="{{ route('work-permit.print', $transaction->id) }}" target="_blank" class="btn btn-warning btn-icon icon-left"><i class="fas fa-print"></i> Print</a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
