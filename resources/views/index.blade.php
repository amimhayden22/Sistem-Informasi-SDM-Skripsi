@extends('dashboard-layouts.app')
@section('title')
    Dasbor
@endsection
@section('style')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('assets/css/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
@endsection
@section('content')
<section class="section">
    <div class="section-header">
      <h1>Dasbor</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">{{ \Carbon\Carbon::now()->isoFormat('dddd, D MMMM Y - H:m'); }}</div>
      </div>
    </div>
    <div class="row">
      <div class="col-12 mb-4">
        <div class="hero bg-danger text-white" style="background-color: #dc0a17 !important;">
          <div class="hero-inner">
            <h2>Human Resource Information System</h2>
            <p class="lead">
                Halo, <strong style="font-weight: bold !important; text-transform: capitalize !important;">{{ optional(Auth::user())->name }}</strong>.
                <br>
                Sistem informasi ini dapat digunakan untuk pengajuan izin kerja (izin, sakit, dan cuti), pengajuan Work from Home (WFH), dan perjalanan dinas.
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
              <i class="fas fa-calendar-alt"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Kehadiran</h4>
              </div>
              <div class="card-body">
                30
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
              <i class="fas fa-calendar-times"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah <i>Unpaid Leave</i></h4>
              </div>
              <div class="card-body">
                {{ $unpaidLeave }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
              <i class="fas fa-calendar-check"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Cuti Diambil</h4>
              </div>
              <div class="card-body">
                {{ $leaveTaken }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6 col-12">
          <div class="card card-statistic-1">
            <div class="card-icon bg-success">
              <i class="fas fa-calendar"></i>
            </div>
            <div class="card-wrap">
              <div class="card-header">
                <h4>Jumlah Sisa Cuti</h4>
              </div>
              <div class="card-body">
                @if (empty($leaveQuota->remainder))
                    0
                @else
                    {{ $leaveQuota->remainder }}
                @endif
              </div>
            </div>
          </div>
        </div>
    </div>
    {{-- @if (optional(Auth::user())->role === 'administrator' || optional(Auth::user())->role === 'manager') --}}
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Grafik Pengajuan Cuti Karyawan per Bulan</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="myChart1"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h4>Data Karywan Paling Banyak Mengambil Cuti</h4>
                        <div class="card-header-action">
                        <a href="{{ route('work-permit.index') }}" class="btn btn-outline-primary btn-sm">
                            Lihat Semua Data
                        </a>
                        &nbsp;
                        <a data-collapse="#cuti-collapse" class="btn btn-icon btn-primary" href="#"><i class="fas fa-minus"></i></a>
                        </div>
                    </div>
                    <div class="collapse show" id="cuti-collapse">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                    <thead>
                                        <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Total Cuti Diambil</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($cutiTransactions as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->employee->name }}</td>
                                            <td>{{ $item->total }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="3" class="text-center">No data available in table</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                    </table>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{-- @endif --}}
</section>
@endsection
@section('script-libraies')
<script src="{{ asset('assets/js/datatables/media/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('assets/css/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('assets/css/datatables.net-select-bs4/js/select.bootstrap4.min.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@endsection
@section('script-page-specific')
<script src="{{ asset('assets/js/page/modules-datatables.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
@endsection
@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    var monthNames = {!! $monthNames !!};
    var transactions = {!! $getTransactions !!};

    window.onload = function(){
        var ctx = document.getElementById("myChart1").getContext('2d');
        lineChartWindow = new Chart(ctx, {
            type: 'line',
            data: {
                labels: monthNames,
                datasets: [{
                    label: 'Jumlah Karyawan Cuti',
                    data: transactions,
                    borderWidth: 2,
                    backgroundColor: '#3772ff',
                    borderColor: '#3772ff',
                    borderWidth: 2.5,
                    pointBackgroundColor: '#ffffff',
                    pointRadius: 4
                }]
            },
            options: {
                legend: {
                    display: false
                },
                scales: {
                    yAxes: [{
                        gridLines: {
                            drawBorder: false,
                            color: '#f2f2f2',
                        },
                        ticks: {
                            beginAtZero: true,
                            stepSize: 150
                        }
                    }],
                    xAxes: [{
                        ticks: {
                            display: false
                        },
                        gridLines: {
                            display: false
                        }
                    }]
                },
            }
        });
    }
</script>
@endsection
