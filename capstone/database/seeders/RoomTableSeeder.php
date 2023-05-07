<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use DB;
class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('rooms')->insert([
            [
                'room_title' => 'Luxurious Unit I',
                'room_price' => 4000,
                'room_image' => 'upload/rooms/luxury.jpg',
                'room_description' => 'This stunning villa offers the ultimate in luxury beachfront living. Relax in your own private pool while enjoying breathtaking ocean views. The villa features high-end finishes and state-of-the-art amenities, including a gourmet kitchen, spacious living areas, and luxurious bedrooms with en-suite bathrooms.',
                'bedrooms' => 3,
                'max_guests' => 8,
                'unit_type' => 'luxury',
                
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
[
                'room_title' => 'Luxurious Unit II',
                'room_price' => 4500,
                'room_image' => 'upload/rooms/lux2.jpg',
                'room_description' => 'This stunning villa offers the ultimate in luxury beachfront living. Relax in your own private pool while enjoying breathtaking ocean views. The villa features high-end finishes and state-of-the-art amenities, including a gourmet kitchen, spacious living areas, and luxurious bedrooms with en-suite bathrooms.',
                'bedrooms' => 3,
                'max_guests' => 8,
                'unit_type' => 'luxury',
                
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
[
                'room_title' => 'Luxurious Unit II',
                'room_price' => 5000,
                'room_image' => 'upload/rooms/lux3.jpg',
                'room_description' => 'This stunning villa offers the ultimate in luxury beachfront living. Relax in your own private pool while enjoying breathtaking ocean views. The villa features high-end finishes and state-of-the-art amenities, including a gourmet kitchen, spacious living areas, and luxurious bedrooms with en-suite bathrooms.',
                'bedrooms' => 3,
                'max_guests' => 8,
                'unit_type' => 'luxury',
                
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
[
                'room_title' => 'VIP Unit I',
                'room_price' => 10000,
                'room_image' => 'upload/rooms/vip1.jpg',
                'room_description' => 'This charming studio apartment is perfect for solo travelers or couples looking for a cozy and convenient home base in the city. The unit is fully furnished and equipped with modern amenities, including a comfortable bed, a small kitchenette, and a private bathroom. Located in the heart of the city, it is just steps away from top attractions, restaurants, and nightlife.',
                'bedrooms' => 1,
                'max_guests' => 2,
                'unit_type' => 'vip',
                
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
[
                'room_title' => 'VIP Unit II',
                'room_price' => 12000,
                'room_image' => 'upload/rooms/vip2.jpg',
                'room_description' => 'This charming studio apartment is perfect for solo travelers or couples looking for a cozy and convenient home base in the city. The unit is fully furnished and equipped with modern amenities, including a comfortable bed, a small kitchenette, and a private bathroom. Located in the heart of the city, it is just steps away from top attractions, restaurants, and nightlife.',
                'bedrooms' => 1,
                'max_guests' => 2,
                'unit_type' => 'vip',
                
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
[
                'room_title' => 'VIP Unit III',
                'room_price' => 15000,
                'room_image' => 'upload/rooms/vip3.jpeg',
                'room_description' => 'This charming studio apartment is perfect for solo travelers or couples looking for a cozy and convenient home base in the city. The unit is fully furnished and equipped with modern amenities, including a comfortable bed, a small kitchenette, and a private bathroom. Located in the heart of the city, it is just steps away from top attractions, restaurants, and nightlife.',
                'bedrooms' => 1,
                'max_guests' => 2,
                'unit_type' => 'vip',
                
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],


            [
                'room_title' => 'Cozy Unit I',
                'room_price' => 2000,
                'room_image' => 'upload/rooms/cozy.jpg',
                'room_description' => 'This charming studio apartment is perfect for solo travelers or couples looking for a cozy and convenient home base in the city. The unit is fully furnished and equipped with modern amenities, including a comfortable bed, a small kitchenette, and a private bathroom. Located in the heart of the city, it is just steps away from top attractions, restaurants, and nightlife.',
                'bedrooms' => 1,
                'max_guests' => 2,
                'unit_type' => 'cozy',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
[
                'room_title' => 'Cozy Unit II',
                'room_price' => 2300,
                'room_image' => 'upload/rooms/cozy2.jpg',
                'room_description' => 'This charming studio apartment is perfect for solo travelers or couples looking for a cozy and convenient home base in the city. The unit is fully furnished and equipped with modern amenities, including a comfortable bed, a small kitchenette, and a private bathroom. Located in the heart of the city, it is just steps away from top attractions, restaurants, and nightlife.',
                'bedrooms' => 1,
                'max_guests' => 2,
                'unit_type' => 'cozy',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
[
                'room_title' => 'Cozy Unit III',
                'room_price' => 2500,
                'room_image' => 'upload/rooms/cozy3.jpg',
                'room_description' => 'This charming studio apartment is perfect for solo travelers or couples looking for a cozy and convenient home base in the city. The unit is fully furnished and equipped with modern amenities, including a comfortable bed, a small kitchenette, and a private bathroom. Located in the heart of the city, it is just steps away from top attractions, restaurants, and nightlife.',
                'bedrooms' => 1,
                'max_guests' => 2,
                'unit_type' => 'cozy',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],

            [
                'room_title' => 'Studio Apartment I',
                'room_price' => 1000,
                'room_image' => 'upload/rooms/studio1.jpg',
                'room_description' => 'This charming studio apartment is perfect for solo travelers or couples looking for a cozy and convenient home base in the city. The unit is fully furnished and equipped with modern amenities, including a comfortable bed, a small kitchenette, and a private bathroom. Located in the heart of the city, it is just steps away from top attractions, restaurants, and nightlife.',
                'bedrooms' => 0,
                'max_guests' => 2,
                'unit_type' => 'studio',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
 [
                'room_title' => 'Studio Apartment II',
                'room_price' => 1200,
                'room_image' => 'upload/rooms/studio2.jpeg',
                'room_description' => 'This charming studio apartment is perfect for solo travelers or couples looking for a cozy and convenient home base in the city. The unit is fully furnished and equipped with modern amenities, including a comfortable bed, a small kitchenette, and a private bathroom. Located in the heart of the city, it is just steps away from top attractions, restaurants, and nightlife.',
                'bedrooms' => 0,
                'max_guests' => 2,
                'unit_type' => 'studio',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
 ],
 [
                'room_title' => 'Studio Apartment III',
                'room_price' => 1500,
                'room_image' => 'upload/rooms/studio3.jpg',
                'room_description' => 'This charming studio apartment is perfect for solo travelers or couples looking for a cozy and convenient home base in the city. The unit is fully furnished and equipped with modern amenities, including a comfortable bed, a small kitchenette, and a private bathroom. Located in the heart of the city, it is just steps away from top attractions, restaurants, and nightlife.',
                'bedrooms' => 0,
                'max_guests' => 2,
                'unit_type' => 'studio',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ]
        ]);
    }
}
