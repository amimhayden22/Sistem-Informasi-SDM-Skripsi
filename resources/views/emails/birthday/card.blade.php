@component('mail::message')
# Halo {{ $employee->name }} 👋
<p>
    Kami dari perusahaan ingin mengucapkan selamat ulang tahun yang ke {{ \Carbon\Carbon::createFromDate($employee->date_of_birth)->diffInYears(\Carbon\Carbon::now()) }} tahun 🎂
    <br>
    Segala yang terbaik semoga senantiasa bersamamu 😁
    <br>
    Terima kasih atas dedikasi dan kontribusimu di perusahaan.
</p>
<p style="opacity: 0.8 !important;">
    - Best regards, <b>Sadasa Academy Team</b>
</p>
@endcomponent