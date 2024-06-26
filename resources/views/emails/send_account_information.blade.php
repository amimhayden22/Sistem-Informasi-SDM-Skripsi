@component('mail::message')
# Halo <span style="color: #c40000 !important">{{ $employee->name }}</span>

Selamat datang di <span style="color: #c40000 !important">PT. Sadasa Akademi Indonesia!</span>
<br><br>
Berikut kami sampaikan informasi mengenai akun
Sistem Informasi Karyawan / <span style="color: #c40000 !important">Human Resources Information System (HRIS)</span>
Sadasa Academy di https://hris.sadasa.id:
<br><br>
1. Untuk saat ini, **akun HRIS dapat digunakan untuk**:
	- Pengajuan izin kerja (izin, sakit, dan cuti), dan
	- Pengajuan Work from Home (WFH).
2. Fungsi-fungsi di atas, dapat digunakan setelah anda masuk/login. Berikut **petunjuk untuk masuk ke akun HRIS** anda:
	- Masukkan **surel** dan **kata sandi**:
	- Surel: {{  $employee->email }}
	- Kata Sandi: S4dasa_YYYYMMDD
	- YYYYMMDD diisi dengan tanggal lahir anda, misalnya tanggal lahir anda adalah 1 Mei 2019, maka Kata Sandi anda **S4dasa_20190501**.
	- Ceklis captcha '**Saya Bukan Robot**',
	- Tekan tombol '**Masuk**',
3. Setelah berhasil masuk, silakan **perbarui kata sandi** anda, dengan:
	- Klik nama anda di pojok kanan atas,
	- Kemudian pilih **profil**,
	- Masukkan kata sandi dan konfirmasi kata sandi, dan
	- Tekan tombol '**Simpan**'.

@component('mail::button', ['url' => 'https://hris.sadasa.id'])
Login Akun
@endcomponent

Jika mengalami kendala, silakan menghubungui pihak **Web Development** (Khamim).
<br><br>

Best regards,<br>
<strong>Sadasa Academy Team</strong> <br>
Jalan Sagan GK. V No. 900, Terban Gondokusuman, Yogyakarta 55223
<br>
085869289987 (WhatsApp) | info@sadasa.id | www.sadasa.id
<br>
<p>
    <i>Jika tombol diatas tidak berfungsi silahkan kunjungi <a href="{{ route('login') }}">{{ route('login') }}</a></i>
</p>
@endcomponent
