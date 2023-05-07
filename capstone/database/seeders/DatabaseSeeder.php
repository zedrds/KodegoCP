<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $this->call(UserTableSeeder::class);
        $this->call(AmenitiesTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(OwnerTableSeeder::class);
        $this->call(UnitTypesTableSeeder::class);
        $this->call(HomepageTableSeeder::class);
        $this->call(RoomTableSeeder::class);
        $this->call(RoomFeatureTableSeeder::class);
        $this->call(RoomAmenityTableSeeder::class);
        $this->call(RoomThumbnailTableSeeder::class);
        \App\Models\User::factory(8)->create();
    }
}
