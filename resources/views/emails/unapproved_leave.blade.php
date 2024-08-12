@component('mail::message')
# Informasi Pengajuan Cuti Karyawan

Yth. <br>{{ $updateTransaction->employee->name }}
<br>
Berikut informasi rinci dari pengajuan Anda:
<br><br>
<strong>Nama:</strong>
<br>
{{ $updateTransaction->employee->name }}
<br>
<strong>Pengambilan Cuti:</strong>
<br>
{{ date('d F Y', strtotime($updateTransaction->leave_date)) }}
<br>
<strong>Tanggal Masuk Kembali:</strong>
<br>
{{ date('d F Y', strtotime($updateTransaction->return_date)) }}
<br>
<strong>Keperluan Izin Kerja Untuk:</strong>
<br>
{{ $updateTransaction->for }}
<br>
<strong>Alasan Izin Kerja:</strong>
<br>
{{ $updateTransaction->description }}
@if ( $updateTransaction->attachment )
  <br>
<strong>Lampiran:</strong>
  Untuk melihat lampiran silakan <a href="{{ asset('images/attachment/'. $updateTransaction->attachment) }}" target="_blank" rel="noopener no-referrer">klik di sini.</a>
@endif
<br>
<strong>Alasan penolakan karena,</strong>
<br>
{{ $updateTransaction->reason }}
<br><br>
Anda bisa memeriksa terkait pengajuan cuti melalui klik tombol "<strong>Buka Website</strong>".<br>
Terima Kasih.

@component('mail::button', ['url' => 'https://hris.khamim.my.id/dashboard/work-permit'])
Buka Website
@endcomponent

Best regards,<br>
<strong>Sadasa Academy Team</strong> <br>
Jalan Sagan GK. V No. 900, Terban Gondokusuman, Yogyakarta 55223
<br>
085869289987 (WhatsApp) | info@sadasa.id | www.sadasa.id
<br>
<p>
    <i>Jika tombol diatas tidak berfungsi silahkan kunjungi <a href="{{ route('work-permit.index') }}">{{ route('work-permit.index') }}</a></i>
</p>
@endcomponent
