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
            'description' => 'Awesome Zakim Bridge Pic',
            'user_id' => '1',
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'filepath' => 'http://www.zakim-bridge.com/files/SN-images/Zakim_Bridge_night.jpg',
            'description' => 'Okay Zakim Bridge Pic',
            'user_id' => '1',
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'filepath' => 'http://cache.boston.com/bonzai-fba/Globe_Photo/2011/05/10/ch-01__1305055431_9156.jpg',
            'description' => 'Boston Chinatown Gate Pic1',
            'user_id' => '2',
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'filepath' => 'http://cdn1.bostonmagazine.com/wp-content/uploads/2013/01/fea_food_chinatown2.jpg',
            'description' => 'Boston Chinatown Gate Pic2',
            'user_id' => '2',
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'filepath' => 'https://upload.wikimedia.org/wikipedia/commons/e/e0/John_Harvard_Statue.JPG',
            'description' => 'John Harvard Statue Pic1',
            'user_id' => '1',
        ]);

        DB::table('photos')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'filepath' => 'https://upload.wikimedia.org/wikipedia/commons/4/4e/John_Harvard_statue.jpg',
            'description' => 'John Harvard Statue Pic2',
            'user_id' => '1',
        ]);
    }
}
