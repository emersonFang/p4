<?php

use Illuminate\Database\Seeder;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'filepath' => 'https://upload.wikimedia.org/wikipedia/commons/8/8c/Leonard_P._Zakim_Bunker_Hill_Bridge_-_Boston%2C_MA_crop.jpg',
            'photo_description' => 'Awesome Zakim Bridge Pic',
            'landmark_id'=> '1',
            'user_id' => '1',
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'filepath' => 'http://www.zakim-bridge.com/files/SN-images/Zakim_Bridge_night.jpg',
            'photo_description' => 'Okay Zakim Bridge Pic',
            'landmark_id'=> '1',
            'user_id' => '1',
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'filepath' => 'http://cache.boston.com/bonzai-fba/Globe_Photo/2011/05/10/ch-01__1305055431_9156.jpg',
            'photo_description' => 'Boston Chinatown Gate Pic1',
            'landmark_id'=> '2',
            'user_id' => '2',
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'filepath' => 'http://cdn1.bostonmagazine.com/wp-content/uploads/2013/01/fea_food_chinatown2.jpg',
            'photo_description' => 'Boston Chinatown Gate Pic2',
            'landmark_id'=> '2',
            'user_id' => '2',
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'filepath' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/John_Harvard_Statue.JPG',
            'photo_description' => 'John Harvard Statue Pic1',
            'landmark_id'=> '3',
            'user_id' => '1',
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'filepath' => 'https://upload.wikimedia.org/wikipedia/commons/4/4e/John_Harvard_statue.jpg',
            'photo_description' => 'John Harvard Statue Pic2',
            'landmark_id'=> '3',
            'user_id' => '1',
        ]);
    }
}
