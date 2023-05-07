<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use DB;

class AmenitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('amenities')->insert([
            [
                'amenity_name' => 'Kitchen',
                'amenity_slug' => 'kitchen',
                'amenity_image' => 'upload/amenities/kitchen.webp',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'amenity_name' => 'Private pool',
                'amenity_slug' => 'private-pool',
                'amenity_image' => 'upload/amenities/pool.webp',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'amenity_name' => 'View',
                'amenity_slug' => 'view',
                'amenity_image' => 'upload/amenities/view.webp',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'amenity_name' => 'Laundry area',
                'amenity_slug' => 'laundry-area',
                'amenity_image' => 'upload/amenities/laundry.webp',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
        ]);
    }
}
