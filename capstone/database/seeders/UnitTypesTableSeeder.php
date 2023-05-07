<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use DB;
class UnitTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('unit_types')->insert([
            [
                'unit_name' => 'Studio',
                'unit_slug' => 'studio',
                'unit_description' => 'UNWIND Studio Units are designed with relaxation and comfort in mind. Each unit is tastefully furnished and equipped with modern amenities, including a comfortable bed, a flat-screen TV, and a kitchenette. With its serene ambiance and well-appointed interiors, guests can enjoy a tranquil stay at UNWIND Studio Units.',
                'unit_image' => 'upload/factory_imgs/studio.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'unit_name' => 'Cozy',
                'unit_slug' => 'cozy',
                'unit_description' => 'UNWIND offers cozy and inviting units perfect for a relaxing stay. Each unit is thoughtfully designed with comfortable furnishings and modern amenities such as a plush bed, a flat-screen TV, and a well-equipped kitchenette. With its peaceful atmosphere and comfortable interiors, UNWIND is the ideal retreat after a day of exploring the city.',
                'unit_image' => 'upload/factory_imgs/cozy.jpeg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'unit_name' => 'Luxury',
                'unit_slug' => 'luxury',
                'unit_description' => 'UNWIND offers luxurious and indulgent units for the ultimate indulgence. The Luxury Units feature elegant interiors, expansive spaces, plush bedding, high-end entertainment systems, and upscale kitchen facilities. With impeccable design and luxurious features, UNWIND Luxury Units provide unparalleled comfort and sophistication.',
                'unit_image' => 'upload/factory_imgs/luxury.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'unit_name' => 'VIP',
                'unit_slug' => 'vip',
                'unit_description' => 'UNWIND VIP Units offer an exclusive and luxurious experience with its spacious interiors, top-of-the-line amenities, and personalized services. Guests can enjoy a private balcony, breathtaking views, high-end entertainment systems, and upscale kitchen facilities. With its exceptional design and VIP services, UNWIND VIP Units provide an unparalleled level of comfort and exclusivity.',
                'unit_image' => 'upload/factory_imgs/vip.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
        ]);
    }
}
