@component('mail::message')
# Informasi Pengajuan Cuti Karyawan

Yth. <br>{{ $updateTransaction->employee->name }}
<br>
Berikut kami sampaikan bahwa cuti Anda telah disetujui. Terlampir informasi rinci dari cuti yang Anda ambil adalah sebagai berikut:
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
<strong>Keperluan Cuti:</strong>
<br>
{{ $updateTransaction->description }}
<br><br>
Untuk melihat lebih lanjut, silahkan klik tombol "<strong>Buka Website</strong>"<br>
Terima Kasih.

@component('mail::button', ['url' => 'https://hris.sadasa.id/dashboard/work-permit'])
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