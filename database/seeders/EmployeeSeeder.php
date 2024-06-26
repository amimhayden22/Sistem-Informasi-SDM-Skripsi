<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = [
            [
                'id' => 1,
                'part_id' => 1,
                'position_id' => 1,
                'user_id' => 1,
                'code' => 'SDS-001',
                'name' => 'Krisostomus Nova Rahmanto',
                'place_of_birth' => 'Yogyakarta',
                'date_of_birth' => \Carbon\Carbon::parse(2022-10-10),
                'email' => 'direktur@mail.com',
                'address' => 'Yogyakarta',
                'phone' => 628564387797,
                'religion' => 'Kristen Protestan',
                'education' => 'S2',
                'bank' => 'BCA',
                'account_number' => 7418546321,
                'start_contract' => \Carbon\Carbon::parse(2020-01-01),
                'end_of_contract' => \Carbon\Carbon::parse(2022-01-01),
                'basic_salary' => 5000000,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 2,
                'part_id' => 4,
                'position_id' => 16,
                'user_id' => 2,
                'code' => 'SDS-002',
                'name' => 'Elisabeth Cesaria Dwi Nuriskiyati',
                'place_of_birth' => 'Yogyakarta',
                'date_of_birth' => \Carbon\Carbon::parse(1996-07-01),
                'email' => 'test1@mail.com',
                'address' => 'Jalan Yudistira C.27 Prm. Kasper RT 075 Desa Pendowoharjo, Kecamatan Sewon, Kabupaten Bantul, Provinsi Daerah Istimewa Yogyakarta',
                'phone' => 6281266326016,
                'religion' => 'Kristen Katolik',
                'education' => 'D3',
                'bank' => 'BCA',
                'account_number' => 4451397499,
                'start_contract' => \Carbon\Carbon::parse('2020-01-08'),
                'end_of_contract' => \Carbon\Carbon::parse('2021-01-08'),
                'basic_salary' => 2755102,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id' => 3,
                'part_id' => 5,
                'position_id' => 19,
                'user_id' => 3,
                'code' => 'SDS-003',
                'name' => 'Muhammad Gus Khamim',
                'place_of_birth' => 'Magelang',
                'date_of_birth' => \Carbon\Carbon::parse('2000-08-22'),
                'email' => 'webdev1@mail.com',
                'address' => 'Kalitejo, RT 002/ RW 007, Desa Banyusari, Kecamatan Grabag, Kabupaten Magelang, Provinsi Jawa Tengah',
                'phone' => 6285713583425,
                'religion' => 'Islam',
                'education' => 'SMK',
                'bank' => 'BCA',
                'account_number' => 1221453064,
                'start_contract' => \Carbon\Carbon::parse(2020-01-18),
                'end_of_contract' => \Carbon\Carbon::parse(2021-01-18),
                'basic_salary' => 2653061,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
        ];

        \DB::table('employees')->insert($employees);
    }
}
