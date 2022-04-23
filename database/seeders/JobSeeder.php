<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Employer;
use App\Models\Job;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        //create 10 random jobs
        for ($i = 0; $i < 10; $i++) {
            Job::create([
                'category_id' => Category::all()->random(1)->first()->id,
                'employer_id' => Employer::all()->random(1)->first()->id,
                'title' => $faker->text(rand(30, 45)),
                'description' => $faker->text(rand(400, 500)),
                'positions' => rand(1, 4),
                'deadline' => Carbon::now()->addDays(5)
            ]);
        }
    }
}
