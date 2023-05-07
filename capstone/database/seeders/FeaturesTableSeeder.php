<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use DB;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('features')->insert([
            [
                'feature_name' => 'Air-conditioning',
                'feature_slug' => 'air-conditioning',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'feature_name' => 'Free WiFi',
                'feature_slug' => 'free-wifi',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'feature_name' => 'Sauna',
                'feature_slug' => 'sauna',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'feature_name' => 'Bar',
                'feature_slug' => 'bar',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'feature_name' => 'Garden',
                'feature_slug' => 'garden',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'feature_name' => 'Swimming pool',
                'feature_slug' => 'swimming-pool',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'feature_name' => 'Hot tub',
                'feature_slug' => 'hot-tub',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
        ]);
    }
}
