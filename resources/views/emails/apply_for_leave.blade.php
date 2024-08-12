@component('mail::message')
# Informasi Pengajuan Izin Kerja Karyawan

Yth. <br> {{ $for }} PT. Sadasa Akademi Indonesia
<br>
Berikut kami sampaikan terdapat karyawan yang mengajukan izin kerja. Terlampir informasi rinci dari karyawan tersebut:
<br><br>
<strong>Nama:</strong>
<br>
{{ $createTransaction->employee->name }}
<br>
<strong>Pengambilan Izin Kerja:</strong>
<br>
{{ date('d F Y', strtotime($createTransaction->leave_date)) }}
<br>
<strong>Tanggal Masuk Kembali:</strong>
<br>
{{ date('d F Y', strtotime($createTransaction->return_date)) }}
<br>
<strong>Keperluan Izin Kerja Untuk:</strong>
<br>
{{ $createTransaction->for }}
<br>
<strong>Alasan Izin Kerja:</strong>
<br>
{{ $createTransaction->description }}
@if ( $createTransaction->attachment )
  <br>
<strong>Lampiran:</strong>
<br>
  Untuk melihat lampiran silakan <a href="{{ asset('images/attachment/'. $createTransaction->attachment) }}" target="_blank" rel="noopener no-referrer">klik di sini.</a>
@endif
<br><br>
Mohon untuk ditindaklanjuti, dengan "menyetujui atau menolak"  melalui klik tombol "<strong>Buka Website</strong>".<br>
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
