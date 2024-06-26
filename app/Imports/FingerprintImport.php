<?php

namespace App\Imports;

use App\Models\Holiday;
use Illuminate\Support\Collection;
use App\Models\{Attendance, Employee};
use Maatwebsite\Excel\Concerns\ToCollection;

class FingerprintImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // dd($collection);
        foreach ($collection as $key => $data) {
            // Memanggil data karyawan berdasarkan NIP/Kode Karyawan
            $checkEmployee = Employee::where('code', $data[1])->first();

            if($key >= 1){
                $coba = (floatval($data[2]) - 25569) * 86400;
                $getDate = date('Ymd', $coba);

                // memeriksa karyawan atas nama dimas
                $checkDirektur = 'SDS-001';
                $checkMeimunah = 'SDS-005';
                $checkSahala = 'SDS-025';
                if ($checkMeimunah === $data[1]) {
                    if($data[12] == 0 || $data[12] == '0'){

                        $getScanIn = date('H:i', strtotime($data[7]));
                        $getScanOut = date('H:i', strtotime($data[10]));
                        $massLeave = Holiday::whereType('Cuti Bersama')->where('date', date('Y-m-d', $coba))->first();
                        if (is_null($massLeave)) {
                            // dd(0);
                            $getCounted = '0';
                        }else{
                            // dd(1);
                            $getCounted = '1';
                        }

                    }else{
                        // dd('cek dihitung 1 '.$data[1].' '.$data[7]);
                        // dd($data[12]);
                        if (empty($data[7])){
                            $getScanIn = date('H:i', strtotime('09:00'));
                        }else{
                            $getScanIn = date('H:i', strtotime($data[7]));
                        }

                        if (empty($data[10]) || $data[10] === '00:00' || $data[10] === '00.00'){
                            if($getScanIn >= date('H:i', strtotime('09:00'))){
                                // dd('lebih dari jam 9 '.$data[10]);
                                $resultTime = strtotime('+8 hours', strtotime($getScanIn));
                                $getScanOut = date('H:i', $resultTime);
                            }else{
                                // dd('kurang dari jam 9 '.$data[10]);
                                $resultTime = strtotime('+8 hours', strtotime('09:00'));
                                $getScanOut = date('H:i', $resultTime);
                            }
                        }else{
                            $getScanOut = date('H:i', strtotime($data[10]));
                        }

                        $getCounted = '1';
                    }

                    Attendance::create([
                        'employee_id'   => $checkEmployee->id,
                        'date'          => $getDate,
                        'scan_in'       => $getScanIn,
                        'scan_out'      => $getScanOut,
                        'counted'       => $getCounted
                    ]);
                } else {
                    // Memeriksa data direktur terlebih dahulu
                    if ($data[1] === $checkDirektur || $data[1] === $checkSahala) {
                        if (empty($data[7]) || $data[7] === '00:00' || $data[7] === '00.00'){
                            $getScanIn = date('H:i', strtotime('09:00'));
                        }else{
                            $getScanIn = date('H:i', strtotime($data[7]));
                        }

                        if (empty($data[10]) || $data[10] === '00:00' || $data[10] === '00.00'){
                            if($getScanIn >= date('H:i', strtotime('09:00'))){
                                // dd('lebih dari jam 9');
                                $resultTime = strtotime('+8 hours', strtotime($getScanIn));
                                $getScanOut = date('H:i', $resultTime);
                            }else{
                                // dd('kurang dari jam 9');
                                $resultTime = strtotime('+8 hours', strtotime('09:00'));
                                $getScanOut = date('H:i', $resultTime);
                            }
                        }else{
                            $getScanOut = date('H:i', strtotime($data[10]));
                        }

                        $getCounted = '1';
                    }else{
                        // Memeriksa kolom dihitung
                        // dd($data[12].$data[1]);
                        if($data[12] == 0 || $data[12] == '0'){
                            // dd('cek dihitung 0');
                            $getScanIn = date('H:i', strtotime($data[7]));
                            $getScanOut = date('H:i', strtotime($data[10]));
                            $massLeave = Holiday::whereType('Cuti Bersama')->where('date', date('Y-m-d', $coba))->first();
                            if (is_null($massLeave)) {
                                // dd('tidak ada cutber ');
                                $getCounted = '0';
                            }else{
                                // dd('ada cutber ');
                                $getCounted = '1';
                            }

                        }else{
                            // dd('cek dihitung 1 '.$data[1].' '.$data[7]);
                            // dd($data[1]);
                            if (empty($data[7])){
                                $getScanIn = date('H:i', strtotime('09:00'));
                            }else{
                                $getScanIn = date('H:i', strtotime($data[7]));
                            }

                            if (empty($data[10]) || $data[10] === '00:00' || $data[10] === '00.00'){
                                if($getScanIn >= date('H:i', strtotime('09:00'))){
                                    // dd('lebih dari jam 9 '.$data[10]);
                                    $resultTime = strtotime('+8 hours', strtotime($getScanIn));
                                    $getScanOut = date('H:i', $resultTime);
                                }else{
                                    // dd('kurang dari jam 9 '.$data[10]);
                                    $resultTime = strtotime('+8 hours', strtotime('09:00'));
                                    $getScanOut = date('H:i', $resultTime);
                                }
                            }else{
                                $getScanOut = date('H:i', strtotime($data[10]));
                            }

                            $getCounted = '1';
                        }

                        // dd('cek dihitung 1 '.$getScanOut);
                    }

                    // Memeriksa apakah tanggal tersebut adalah hari sabtu atau minggu
                    $dayOfWeek = date('w', strtotime($getDate));
                    if ($dayOfWeek != 0 && $dayOfWeek != 6) {
                        // Tanggal bukan hari sabtu atau minggu, masukkan ke database
                        Attendance::create([
                            'employee_id'   => $checkEmployee->id,
                            'date'          => $getDate,
                            'scan_in'       => $getScanIn,
                            'scan_out'      => $getScanOut,
                            'counted'       => $getCounted
                        ]);
                    }
                }
            }
        }
    }
}
