# Human Resource Information System

## List Pekerjaan yang belum selesai
1. Integrasi Fingerprint Kantor
   - Nama Branch:
   - Keterangan:
2. Modul Stok Izin Kerja dan Work From Home
3. Modul Cuti Bersama
4. Modul Slip Gaji
5. Pembuatan Dasbor

## Notes from Anak PKL
### Tenggat Waktu: 29 Desember 2022
1. Modul Pengajuan Izin Kerja (Menambahkan dropdown sub_permission) 
   - Nama Branch: revisi-Modul-Pengajuan-Izin_Kerja (baru) 
   - Keterangan: - Belum Selesai
                 - Dropdown tambah sub_permission sudah berfungsi, (old dropdown sudah muncul, tapi ketika input sub_permission kosong atau tidak memilih apa-apa, maka                    kolom sub_permission tersebut tidak muncul), jadi harus memilih input keperluan "izin" lagi agar kolom sub_permission muncul lagi.
                 - (Kolom lampiran tidak muncul saat ada form yang validasinya kurang), jadi harus memilih input keperluan "izin" lagi agar kolom lampiran muncul lagi.
                 - Rincian Izin Kerja (sub_permission) ke dalam pop up sebelum submit data belum berhasil ditampilkan.
                 - Align left pada detail Izin Kerja (done)
                 - sudah di-push, jangan di-merge dulu

   - Nama Branch: fix-Membuat-Modul-Pengajuan-Izin-Kerja_Sadasa-Academy (Memperbarui Alert)
   - Keterangan: - Sudah selesai
                 - Sudah dipush, sudah dimerge
   - PIC : Ilham Andaru Prabowo
2. Middleware Auth user (Karyawan dengan status Inactive tidak bisa login ke sistem)
   - Nama Branch: middleware-auth-user (baru) 
   - Keterangan: - Sudah selesai
                 - sudah di-push, sudah di-merge 
   - PIC : Ilham Andaru Prabowo
3. Modul Stok Izin Kerja
   - Nama Branch: Modul-Stok_Izin_Kerja_Sadasa-Academy
   - Keterangan: Sudah Selesai, belum di Merge
   - PIC: Muhammad Restu Pamungkas
4. Memperbaiki Modul Pengajuan WFH
   - Nama Branch: fix-Membuat-Modul-Pengajuan-WFH_Sadasa-Academy
   - Keterangan: Sudah di Merge, rincian:
                    -Memperbaiki pesan pada pop up
                    -Menambahkan align left pada detail WFH
                    -Menambahkan detail status
                    -Memperbarui alert
                    
   - Nama Branch: Mengubah-Modul-Pengajuan-WFH_Sadasa-Academy
   - Keterangan: Sudah di Merge, rincian:
                    -Melihat detail clickup harus melakukan login terlebih dahulu
   - PIC: Muhammad Restu Pamungkas
5. Memperbarui Modul Pengguna
   - Nama Branch: Modul-Manajemen-Pengguna_Sadasa-Academy
   - Keterangan: Sudah di Merge, rincian:
                    -Readonly pada kolom email pada edit data dihapus
		            -Membuat fitur show password pada halaman create dan edit data
   - PIC: Muhammad Restu Pamungkas
6. Memperbaiki Modul Karyawan
   - Nama Branch: Modul-Manajemen-Karyawan_Sadasa-Academy
   - Keterangan: - Sudah di-merge, untuk perbaikannya adalah sebagai berikut:
                    - Menambahkan old value pada form create dan edit file employees/create.blade.php, employees/edit.blade.php, employees/new_employee.blade.php 
                NOTE: untuk input old Jabatan (form create) ketika ada validasi yang kurang, maka old Jabatan tidak muncul, list jabatannya juga kosong, jadi harus klik input Bagian ulang supaya bisa muncul lagi.
