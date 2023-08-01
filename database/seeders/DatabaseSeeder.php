<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

       Book::factory(33)->create()->each(function (Book $book) {
           $numReview = random_int(5,30);

           Review::factory()->count($numReview)->good()->for($book)->create();

         });
        Book::factory(34)->create()->each(function (Book $book) {
            $numReview = random_int(5,30);

            Review::factory()->count($numReview)->avarage()->for($book)->create();

        });

        Book::factory(33)->create()->each(function (Book $book) {
            $numReview = random_int(5,30);

            Review::factory()->count($numReview)->bad()->for($book)->create();

        });
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
