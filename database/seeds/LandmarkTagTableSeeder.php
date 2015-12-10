<?php

use Illuminate\Database\Seeder;

class LandmarkTagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        # First, create an array of all the landmarks we want to associate tags with
        # The *key* will be the landmark name, and the *value* will be an array of tags.
        $landmarks =[
            'Zakim Bridge' => ['bridge','metallic','large','scenic'],
            'Boston Chinatown Gate' => ['ethnic','Chinese','gate','large'],
            'John Harvard Statue' => ['statue','Harvard','academic','metallic']
        ];

        # Now loop through the above array, creating a new pivot for each book to tag
        foreach($landmarks as $landmarkname => $tags) {

            # First get the book
            $landmark = \App\Landmark::where('name','like',$landmarkname)->first();

            # Now loop through each tag for this book, adding the pivot
            foreach($tags as $tagName) {
                $tag = \App\Tag::where('name','LIKE',$tagName)->first();

                # Connect this tag to this book
                $landmark->tags()->save($tag);
            }

        }
    }
}
