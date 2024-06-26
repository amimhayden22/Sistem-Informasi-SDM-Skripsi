@component('mail::message')
# Halo {{ $name }}
<p>
    HRIS ingin memberitahu Anda bahwa kontrak karyawan <strong>{{ $employee->name }}</strong> akan berakhir dalam <strong>30 hari</strong> dari tanggal selesai yang ditetapkan pada <strong>{{ \Carbon\Carbon::parse($employee->end_of_contract)->isoFormat('D MMMM Y'); }}</strong>.
    <br>
    Mohon untuk memperhatikan hal ini dan melakukan tindakan yang diperlukan untuk memastikan kelancaran proses selanjutnya terkait kontrak tersebut.
    <br>
    Terima kasih atas perhatiannya.
</p>
<p style="opacity: 0.8 !important;">
    - Best regards, <b>HRIS Sadasa Academy</b>
</p>
@endcomponent
