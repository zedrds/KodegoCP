<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use DB;
class RoomThumbnailTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('room_thumbnails')->insert([
            [
                'room_id' => 1,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-andrea-davis-9753827.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 1,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-quang-nguyen-vinh-14021929.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 1,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-garrison-gao-7884095.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 2,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-lumn-1410227.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 2,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-curtis-adams-4044804.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 2,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-max-rahubovskiy-7587293.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 3,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-max-rahubovskiy-7587775.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 3,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-curtis-adams-5178091.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 3,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-egor-kunovsky-5475923.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 4,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-curtis-adams-5698006.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 4,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-antony-trivet-12977250.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 4,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-curtis-adams-7028062.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 5,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-ata-ebem-10560263.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 5,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-max-rahubovskiy-7533767.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 5,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-iamluisao-12652920.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 6,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-max-rahubovskiy-7546642.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 6,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-nudos-adicora-11062799.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 6,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-iamluisao-12652916.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 7,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-pușcaș-adryan-12881064.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 7,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-max-rahubovskiy-7214468.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 7,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-hakim-santoso-5991565.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 8,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-curtis-adams-5178069.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 8,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-max-rahubovskiy-7005269.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 8,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-hiba-q-omar-14613201.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 9,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-pixabay-271618.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 9,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-vecislavas-popa-1571458.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 9,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-pixabay-276583.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 10,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-freemockupsorg-775219.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 10,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-pixabay-210265.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 10,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-pixabay-271743.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 11,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-vecislavas-popa-1643383.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 11,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-tobi-2346091.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 11,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-nastyasensei-376531.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 12,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-vlada-karpovich-4050318.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 12,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-dmitry-zvolskiy-2082087.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
            [
                'room_id' => 12,
                'thumbnail_name' => 'upload/rooms/thumbnails/pexels-mike-van-schoonderwalt-5511088.jpg',
                'created_at' => Carbon::now()->setTimezone('Asia/Manila'),
            ],
        ]);
    }
}
