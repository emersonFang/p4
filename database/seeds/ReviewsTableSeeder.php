<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'landmark_id' => '3',
            'review' => 'The John Harvard Statue? It\'s a conspiracy to make Harvard Yard congested.',
            'user_id' => '1',
        ]);

        DB::table('reviews')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'landmark_id' => '3',
            'review' => 'Who would want to touch that germ-covered golden shoe?',
            'user_id' => '2',
        ]);

        DB::table('reviews')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'landmark_id' => '1',
            'review' => 'I love the Zakim Bridge.  It is so trendy.',
            'user_id' => '1',
        ]);

        DB::table('reviews')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'landmark_id' => '1',
            'review' => 'The Zakim Bridge is ugly.  Don\'t visit it',
            'user_id' => '2',
        ]);

        DB::table('reviews')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'landmark_id' => '2',
            'review' => 'The Chinatown Gate is funky.  I wonder how they shipped it over here... I\'d visit it again.',
            'user_id' => '1',
        ]);

        DB::table('reviews')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'landmark_id' => '2',
            'review' => 'The Chinatown Gate... is it from China? Or somewhere else? There are so many old people playing Chinese chess next to it.  That is always fun to see.',
            'user_id' => '2',
        ]);
    }
}
