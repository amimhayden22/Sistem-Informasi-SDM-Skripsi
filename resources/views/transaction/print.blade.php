<!DOCTYPE html>
<html lang="en">
<head>
    <title>Print Izin Kerja - {{ $transaction->employee->name }}</title>
    <style type="text/css" media="print">
        @page {
            /* portrait */
            size: 210mm 297mm;
            /* auto is the initial value */
            /* size: auto;  */
            margin: 0; /* this affects the margin in the printer settings */
        }
        @media print{
            * {
                /* Untuk mengaktifkan background graphics */
                /* Chrome, Safari, Edge */
                -webkit-print-color-adjust: exact !important;
                /* Firefox */
                color-adjust: exact !important;
            }
        }
    </style>
    <style>
        
        body{
            font-family: 'Montserrat', sans-serif;
            font-size: 12px
        }
        .izin{
            padding:10px 30px;
            margin-top: 165px;
        }
        table{
            text-align: left;
        }
        h1{
            text-align: center;
            font-size: 20px;
        }
        .invoice-title{
            text-align: center;
            font-size: 16px;
        }
        .items{
            border:2px solid;
            padding:10px 40px;
            margin-left: 30px;
            margin-right: auto;
            margin-top: 25px;
            resize:both;
            overflow:auto;
        }
        .items, .items th, .items td {
            border: 1px solid black;
            border-collapse: collapse;
        }
        .items th, .items td{
            padding: 20px;
            padding-left: 1%;
        }
        .ba_signature{
            margin-top: 20px;
            margin-left: 27px;
        }
        .applicant_signature{
            margin-top: 20px;
            margin-right: 27px;
        }
        .director_signature, .ManagerProDev_signature, .ManagerMarPar_signature{
            margin-top: 200px;
        }
        .img-header img, .img-footer img{
            width: 775px !important;
        }
        .img-header{
            position: absolute;
            top:0;
        }
        .img-header img{
            position: relative;
            display: block;
            float: left;
        }
        .img-footer{
            position: absolute;
            bottom:0;
        }
        .img-footer img{
            position: relative;
            display: block;
            float: left;
        }
    </style>
</head>
<body>
    <div class="img-header">
        <img src="https://assets.sadasa.id/images/surat/Header.svg" alt="Header Surat">
    </div>
    <div class="izin">
            <h1>PERMOHONAN PENGAJUAN IZIN KERJA</h1>
        <table>
            <tbody>
                <tr>
                    <table class="items">
                            <td width="175">Nama</td>
                            <td width="430">{{ $transaction->employee->name }}</td>
                            <tr>
                                <td>Bagian</td>
                                <td>{{ $transaction->employee->part->name }}</td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td>{{ $transaction->employee->position->name }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Izin Kerja</td>
                                <td>{{ date('d F Y', strtotime($transaction->leave_date)) }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal Masuk Kembali</td>
                                <td>{{ date('d F Y', strtotime($transaction->return_date)) }}</td>
                            </tr>
                            <tr>
                                <td>Keperluan Izin Kerja Untuk</td>
                                <td>{{ $transaction->for }}</td>
                            </tr>
                            <tr>
                                <td>Alasan Izin Kerja</td>
                                <td>{{ $transaction->description }}</td>
                            </tr>
                    </table>
                </tr>
                <tr>
                    <table class="ba_signature" align="left">
                        <tbody>
                            <tr><td>Business Administration,</td></tr>
                            <tr><td><img src="{{ asset('images/default/ttd-cesa.png') }}" width="125px" alt="Tanda Tangan Admin"></td></tr>
                            <tr><td>{{ $BaGaName->name }}</td></tr>
                        </tbody>
                    </table>
                </tr>
                <tr>
                    <table class="applicant_signature" align="right">
                        <tbody>
                            <tr><td>Pemohon,</td></tr>
                            <tr><td><img src="{{ asset('images/signature/'. $transaction->applicant_signature) }}" width="175px" height="125px" alt="Tanda Tangan Pemohon"></td></tr>
                            <tr><td>{{ $transaction->employee->name }}</td></tr>
                        </tbody>
                    </table>
                </tr>
                <tr></tr>
                <tr></tr>
                <tr></tr>
                    @if($transaction->employee->position->name == 'Web Developer' || $transaction->employee->part->name == 'General Affair' || $transaction->employee->user->role == 'manajer')
                    <tr>
                        <table class="director_signature" align="center">
                            <tbody>
                                <tr><td>Mengetahui,</td></tr>
                                <tr><td>Direktur,</td></tr>
                                <tr><td><img src="{{ asset('images/default/ttd-cap-kristo.png') }}" width="200px" alt="Tanda Tangan Direktur"></td></tr>
                                <tr><td>{{ $directorName->name }}</td></tr>
                            </tbody>
                        </table>
                    </tr>
                    @endif
                    @if($transaction->employee->user->role != 'manajer')
                        @if($transaction->employee->part->name == 'Product Development')
                        <tr>
                            <table class="ManagerProDev_signature" align="center">
                                <tbody>
                                    <tr><td>Mengetahui,</td></tr>
                                    <tr><td>{{ $ManagerProDevName->position->name }},</td></tr>
                                    <tr><td><img src="{{ asset('images/default/ttd-manajer-prodev.png') }}" width="155px" alt="Tanda Tangan Manager Product Development"></td></tr>
                                    <tr><td>{{ $ManagerProDevName->name }}</td></tr>
                                </tbody>
                            </table>
                        </tr>
                        @endif
                        @if($transaction->employee->part->name == 'Marketing and Partnerships')
                        <tr>
                            <table class="ManagerMarPar_signature" align="center">
                                <tbody>
                                    <tr><td>Mengetahui,</td></tr>
                                    <tr><td>{{ $ManagerMarParName->position->name }},</td></tr>
                                    <tr><td><img src="{{ asset('images/default/ttd-manajer-marpar.png') }}" width="200px" alt="Tanda Tangan Manager Marketing & Partnership"></td></tr>
                                    <tr><td>{{ $ManagerMarParName->name }}</td></tr>
                                </tbody>
                            </table>
                        </tr>
                        @endif
                    @endif
            </tbody>
        </table>
    </div>
    <div class="img-footer">
        <img src="https://assets.sadasa.id/images/surat/Footer.svg" alt="Footer Surat">
    </div>
</body>
<script>
    window.print();
</script>
</html>