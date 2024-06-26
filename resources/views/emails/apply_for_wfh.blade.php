@component('mail::message')
# Informasi Pengajuan WFH Karyawan

Yth. <br> {{ $for }} PT. Sadasa Akademi Indonesia
<br>
Berikut kami sampaikan terdapat karyawan yang mengajukan WFH. Terlampir informasi rinci dari karyawan tersebut:
<br><br>
<strong>Nama:</strong>
<br>
{{ $createWfhTransaction->employee->name }}
<br>
<strong>Task ClickUp:</strong>
<br>
Untuk melihat detail bisa <a href="{{ route('work-from-home.detail', $clickup->wfhtransaction_id) }}">klik di sini</a>
<br>
<strong>Pengambilan WFH:</strong>
<br>
{{ date('d F Y', strtotime($createWfhTransaction->leave_date)) }}
<br>
<strong>Tanggal Masuk Kembali:</strong>
<br>
{{ date('d F Y', strtotime($createWfhTransaction->return_date)) }}
<br>
<strong>Keperluan WFH:</strong>
<br>
{{ $createWfhTransaction->description }}
@if ( $createWfhTransaction->reason )
  <br>
  <strong>Keperluan WFH:</strong>
  <br>
  {{ $createWfhTransaction->description }}
@endif
<br><br>
Mohon untuk ditindaklanjuti, dengan "menyetujui atau menolak"  melalui klik tombol "<strong>Buka Website</strong>".<br>
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
