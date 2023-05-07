<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use DB;

class HomepageTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('homepages')->insert([
            [
                'homepage_title' => 'ESCAPE TO BLISSFUL COMFORT',
                'homepage_picture' => 'upload/homepage/1763673796891250.jpg',
                'about_title' => 'WELCOME TO UNWIND',
                'about_title_2' => 'THE COMFORT COOP',
                'about_description' => 'At Unwind, we pride ourselves on our high-end amenities, including a sparkling pool, state-of-the-art fitness center, and a full-service spa. Our rooms are spacious and elegantly designed with your comfort in mind, offering breathtaking views of the [scenic location].',
                'about_picture' => 'upload/homepage/1763673797214104.webp',
                'amenities_title' => 'UNWIND IN STYLE',
                'amenities_title_2' => 'HIGH-END AMENITIES',
                'amenities_description' => 'At our establishment, we pride ourselves on providing our guests with the ultimate in luxury living. From our high-end amenities to our personalized service, we have thought of everything to ensure that your stay with us is as comfortable and relaxing as possible.',
                'amenities_picture' => 'upload/homepage/1763673797574736.jpg',
                'featured_picture' => 'upload/homepage/1763675179957736.jpg',
                'featured_title_1' => 'PERFECT VIEWS',
                'featured_icon_1' => '<i class="ri-landscape-fill"></i>',
                'featured_description_1' => 'Our condotel is aptly named Perfect Views as it offers unparalleled vistas of the surrounding landscape, making it an ideal destination for those seeking breathtaking views. With its expansive windows and world-class facilities, guests can enjoy stunning vistas of the city skyline, mountains, or coastline, depending on their room orientation.',
                'featured_title_2' => 'FAST INTERNET',
                'featured_icon_2' => '<i class="ri-home-wifi-fill"></i>',
                'featured_description_2' => 'Our condotel provides fast and reliable internet speeds that meet the demands of modern living. Whether you are streaming movies, attending virtual meetings, or browsing social media, you can stay connected with our high-speed internet service.',
                'featured_title_3' => 'BUDGET-FRIENDLY',
                'featured_icon_3' => '<i class="ri-price-tag-3-fill"></i>',
                'featured_description_3' => 'Our condotel offers budget-friendly accommodations without compromising comfort and convenience. With affordable room rates, flexible booking options, and various amenities, guests can enjoy a memorable stay without breaking the bank.',
                'unit_title' => 'UNWIND',
                'unit_title_2' => 'THE HAVEN',
                'unit_picture' => 'upload/homepage/1763673797692835.jpg',
                'unit_price' => 1,
                'unit_list' => '<li>Swimming Pool</li><li>Fitness Center</li><li>24/7 Security</li><li>High-Speed Internet</li><li>Parking</li>',
                'location_title' => 'UNWIND',
                'location_title_2' => 'AND RELAX HERE',
                'location_description' => 'In this tranquil oasis designed to cater to your every need. Nestled in the heart of lush greenery, our serene environment offers the perfect escape from the hustle and bustle of everyday life. With our state-of-the-art amenities, personalized service, and breathtaking views, you will experience the ultimate in relaxation and rejuvenation.',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
        ]);
    }
}
