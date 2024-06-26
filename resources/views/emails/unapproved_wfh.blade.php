@component('mail::message')
# Informasi Pengajuan WFH Karyawan

Yth. <br>{{ $updateWfhTransaction->employee->name }}
<br>
Berikut informasi rinci dari pengajuan Anda:
<br><br>
<strong>Nama:</strong>
<br>
{{ $updateWfhTransaction->employee->name }}
<br>
<strong>Task ClickUp:</strong>
<br>
Untuk melihat detail bisa <a href="{{ route('work-from-home.detail', $clickup->wfhtransaction_id) }}">klik di sini</a>
<br>
<strong>Pengambilan WFH:</strong>
<br>
{{ date('d F Y', strtotime($updateWfhTransaction->leave_date)) }}
<br>
<strong>Tanggal Masuk Kembali:</strong>
<br>
{{ date('d F Y', strtotime($updateWfhTransaction->return_date)) }}
<br>
<strong>Keperluan WFH:</strong>
<br>
{{ $updateWfhTransaction->description }}
<br>
<strong>Alasan penolakan karena,</strong>
<br>
{{ $updateWfhTransaction->reason }}
<br><br>
Anda bisa memeriksa terkait pengajuan WFH melalui klik tombol "<strong>Buka Website</strong>".<br>
Terima Kasih.

@component('mail::button', ['url' => 'https://hris.sadasa.id/dashboard/work-from-home'])
Buka Website
@endcomponent

Best regards,<br>
<strong>Sadasa Academy Team</strong> <br>
Jalan Sagan GK. V No. 900, Terban Gondokusuman, Yogyakarta 55223 
<br>
085869289987 (WhatsApp) | info@sadasa.id | www.sadasa.id
<br>
<p>
    <i>Jika tombol diatas tidak berfungsi silahkan kunjungi <a href="{{ route('work-from-home.index') }}">{{ route('work-from-home.index') }}</a></i>
</p>
@endcomponent
