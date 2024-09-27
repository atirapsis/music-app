<?php

namespace Database\Seeders;

use App\Models\Music;
use App\Models\User;
use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use Faker\Factory as Faker;

class MusicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $genres = Genre::all();
        $users = User::all();

        foreach (range(1, 10) as $index) { // Create 10 dummy music records
            Music::create([
                'user_id' => $users->random()->id,
                'title' => $faker->sentence(3), // Generate a random title
                'artist' => $faker->name, // Generate a random artist name
                'genre_id' => $genres->random()->id,
                'release_date' => $faker->date(), // Generate a random release date
                'image' => $faker->image('storage/app/public/image', 150, 100, null, false), // Generate a dummy image file
            ]);
        }
    }
}
