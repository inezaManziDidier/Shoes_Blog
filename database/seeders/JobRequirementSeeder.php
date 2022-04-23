<?php

namespace Database\Seeders;

use App\Models\Job;
use App\Models\JobRequirement;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class JobRequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $jobs = Job::all();
        foreach ($jobs as $job) {
            JobRequirement::create([
                'job_id' => $job->id,
                'experience' => $faker->randomElement(['1 year', '2 years', '3 years', '4 years', '5 years']),
                'education_level' => $faker->randomElement(['PhD', 'master', 'licence', 'bachelor', 'diploma']),
                'contract_type' => $faker->randomElement(['Full-time', 'Part-time', 'Internship'])
            ]);
        }
    }
}
