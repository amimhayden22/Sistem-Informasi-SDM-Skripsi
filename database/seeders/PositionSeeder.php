<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            [
                'id'   => 1,
                'part_id' => 1,
                'name' => 'Chief Executive Officer',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 2,
                'part_id' => 1,
                'name' => 'Chief Operating Officer',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 3,
                'part_id' => 2,
                'name' => 'Product Development Manager',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 4,
                'part_id' => 2,
                'name' => 'Product Owner Training',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 5,
                'part_id' => 2,
                'name' => 'Product Owner VLOD',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 6,
                'part_id' => 2,
                'name' => 'Product Owner Consulting',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 7,
                'part_id' => 2,
                'name' => 'Product Owner DTB',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 8,
                'part_id' => 2,
                'name' => 'Video Editor',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 9,
                'part_id' => 2,
                'name' => 'Script Writer',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 10,
                'part_id' => 3,
                'name' => 'Marketing and Partnerships Manager',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 11,
                'part_id' => 3,
                'name' => 'Business Development',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 12,
                'part_id' => 3,
                'name' => 'Partnership Staff',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 13,
                'part_id' => 3,
                'name' => 'Creative Development',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 14,
                'part_id' => 3,
                'name' => 'Video Content Creator',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 15,
                'part_id' => 3,
                'name' => 'Visual Communication Specialist',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 16,
                'part_id' => 4,
                'name' => 'General Affair Manager',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 17,
                'part_id' => 4,
                'name' => 'Business Admin and General Affair',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 18,
                'part_id' => 4,
                'name' => 'Office Caretaker',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
            [
                'id'   => 19,
                'part_id' => 5,
                'name' => 'Web Developer',
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
            ],
        ];

        \DB::table('positions')->insert($positions);
    }
}
