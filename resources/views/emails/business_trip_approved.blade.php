@component('mail::message')
# Informasi Pengajuan Perjalanan Dinas

Yth. <br>{{ $updateBusinessTrip->employee->name }}
<br>
Berikut kami sampaikan bahwa Perjalanan Dinas Anda telah disetujui. Terlampir informasi rinci dari Perjalanan Dinas yang Anda ambil adalah sebagai berikut:
<br><br>
<strong>Nama:</strong>
<br>
{{ $updateBusinessTrip->employee->name }}
<br>
<strong>Pengambilan Perjalanan Dinas:</strong>
<br>
{{ date('d F Y', strtotime($updateBusinessTrip->leave_date)) }}
<br>
<strong>Tanggal Masuk Kembali:</strong>
<br>
{{ date('d F Y', strtotime($updateBusinessTrip->return_date)) }}
<br>
<strong>Keperluan Perjalanan Dinas:</strong>
<br>
{{ $updateBusinessTrip->description }}
<br>
<strong>Lampiran:</strong>
<br>
Untuk melihat lampiran silakan <a href="{{ asset('images/attachment/'. $updateBusinessTrip->attachment) }}" target="_blank" rel="noopener no-referrer">klik di sini.</a>
<br><br>
Untuk melihat lebih lanjut, silahkan klik tombol "<strong>Buka Website</strong>"<br>
Terima Kasih.

@component('mail::button', ['url' => 'https://hris.sadasa.id/dashboard/business-trip'])
Buka Website
@endcomponent

Best regards,<br>
<strong>Sadasa Academy Team</strong> <br>
Jalan Sagan GK. V No. 900, Terban Gondokusuman, Yogyakarta 55223
<br>
085869289987 (WhatsApp) | info@sadasa.id | www.sadasa.id
<br>
<p>
    <i>Jika tombol diatas tidak berfungsi silahkan kunjungi <a href="{{ route('business-trip.index') }}">{{ route('business-trip.index') }}</a></i>
</p>
@endcomponent
