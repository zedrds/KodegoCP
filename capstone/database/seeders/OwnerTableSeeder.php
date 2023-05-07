<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use DB;

class OwnerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('condo_owners')->insert([
            [
                'owner_name' => 'Management',
                'owner_slug' => 'management',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'owner_name' => 'Marc',
                'owner_slug' => 'marc',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'owner_name' => 'Mealloah Mae',
                'owner_slug' => 'mealloah-mae',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
        ]);
    }
}
