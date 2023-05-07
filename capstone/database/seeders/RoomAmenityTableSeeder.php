<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use DB;
class RoomAmenityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_amenities')->insert([
            [
                'room_id' => 2,
                'amenity_id' => 1,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 2,
                'amenity_id' => 2,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 2,
                'amenity_id' => 4,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 1,
                'amenity_id' => 3,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 1,
                'amenity_id' => 1,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 3,
                'amenity_id' => 1,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 3,
                'amenity_id' => 3,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 3,
                'amenity_id' => 4,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 4,
                'amenity_id' => 4,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 4,
                'amenity_id' => 2,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 5,
                'amenity_id' => 1,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 5,
                'amenity_id' => 3,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 5,
                'amenity_id' => 4,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 6,
                'amenity_id' => 2,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 6,
                'amenity_id' => 4,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 7,
                'amenity_id' => 2,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 7,
                'amenity_id' => 1,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 8,
                'amenity_id' => 1,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 8,
                'amenity_id' => 2,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 8,
                'amenity_id' => 3,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 9,
                'amenity_id' => 3,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 9,
                'amenity_id' => 1,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 9,
                'amenity_id' => 2,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 10,
                'amenity_id' => 3,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 10,
                'amenity_id' => 2,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 11,
                'amenity_id' => 1,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 11,
                'amenity_id' => 3,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 12,
                'amenity_id' => 4,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 12,
                'amenity_id' => 1,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 12,
                'amenity_id' => 2,
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
        ]);
    }
}
