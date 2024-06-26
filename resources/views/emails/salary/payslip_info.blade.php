@component('mail::message')

@if ($createSalary->type === 'THR Slip')
# Holiday Allowance Slip

@greeting(date('H:s')),
<br>
Berikut kami kirimkan Holiday Allowance Slip (Tunjangan Hari Raya) untuk @if(date('m') == 12) Hari Raya Natal @else Bulan Ramdan 1444H @endif. Apabila terdapat masalah dalam proses ini,
silahkan segera hubungi Bagian Keuangan PT Sadasa Akademi Indonesia. Namun jika tidak ada kendala apapun, mohon untuk membalas e-mail ini dengan konfirmasi "<strong>Dana transfer sudah saya terima</strong>".
<br><br>
Demikian e-mail ini kami kirimkan. Kami berharap Saudara dapat terus menjaga semangat dan meningkatkan kinerja di Sadasa Academy.
<br><br>
Selamat Hari Raya Idul Fitri 1444H/2023.
<br><br>
Terima kasih.
@else
# Payslip @php setlocale(LC_ALL, 'IND'); $date = \Carbon\Carbon::parse('2023-03-26'); echo strftime('%B %Y', strtotime($date)); @endphp

@greeting(date('H:s')),
<br>
Berikut kami kirimkan slip gaji untuk bulan @php setlocale(LC_ALL, 'IND'); $date = \Carbon\Carbon::parse('2023-03-26'); echo strftime('%B %Y', strtotime($date)); @endphp dan bukti potong PPh 21 bulan @php setlocale(LC_ALL, 'IND'); $date = \Carbon\Carbon::parse('2023-03-26')->subMonth(); echo strftime('%B %Y', strtotime($date)); @endphp. Apabila terdapat masalah dalam proses ini,
silahkan segera hubungi Bagian Keuangan Sadasa Academy. Namun jika tidak ada kendala apapun,
mohon untuk membalas e-mail ini dengan konfirmasi "<strong>Dana transfer sudah saya terima</strong>".
<br><br>
Demikian e-mail ini kami kirimkan. Kami berharap Saudara dapat terus menjaga semangat dan
meningkatkan kinerja di Sadasa Academy.
<br><br>
Terima kasih.
@endif

@component('mail::button', ['url' => 'https://hris.sadasa.id/periksa-slip/'.$createSalary->id.'/'.($createSalary->uuid === null ? 404 : $createSalary->uuid)])
Cek Slip
@endcomponent

Best regards,<br>
<strong>Sadasa Academy Team</strong> <br>
Jalan Sagan GK. V No. 900, Terban Gondokusuman, Yogyakarta 55223
<br>
085869289987 (WhatsApp) | info@sadasa.id | www.sadasa.id
<br>
@endcomponent
