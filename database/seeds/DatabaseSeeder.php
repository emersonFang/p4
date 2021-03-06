<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        $this->call(UsersTableSeeder::class);
        $this->call(LandmarksTableSeeder::class);
        $this->call(PhotosTableSeeder::class);
        $this->call(ReviewsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(LandmarkTagTableSeeder::class);
        Model::reguard();
    }
}
