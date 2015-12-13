<?php

use Illuminate\Database\Seeder;

class LandmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('landmarks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Zakim Bridge',
            'description' => 'A bridge that goes over the Charles River',
            'location' => 'Somewhere in Boston',
            'user_id' => '1',
        ]);

        DB::table('landmarks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Boston Chinatown Gate',
            'description' => 'A gate donated to Downtown Boston from Taiwan',
            'location' => 'Mainstreet Chinatown, Boston',
            'user_id' => '2',
        ]);

        DB::table('landmarks')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'John Harvard Statue',
            'description' => 'It is not really John Harvard',
            'location' => 'Harvard Yard, Harvard University',
            'user_id' => '1',
        ]);
    }
}
