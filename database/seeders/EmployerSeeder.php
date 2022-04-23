<?php

namespace Database\Seeders;

use App\Models\Employer;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class EmployerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {
            Employer::create([
                'company' => $faker->company(),
                'location' => $faker->address(),
                'description' => $faker->text(rand(300, 340)),
                'email' => $faker->safeEmail()
            ]);
        }
    }
}
