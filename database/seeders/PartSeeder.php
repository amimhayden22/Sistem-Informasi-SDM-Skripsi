<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Part;

class PartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $parts = [
            [
                'id'         => 1,
                'name'       => 'Direktur',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'         => 2,
                'name'       => 'Product Development',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'         => 3,
                'name'       => 'Marketing and Partnerships',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'         => 4,
                'name'       => 'General Affair',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'         => 5,
                'name'       => 'Web Developer',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
        ];

        \DB::table('parts')->insert($parts);
    }
}
