<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        Category::create([
            'name' => 'Accounting',
        ]);

        Category::create([
            'name' => 'Administration',
        ]);

        Category::create([
            'name' => 'Computer and IT',
        ]);

        Category::create([
            'name' => 'Banking',
        ]);

        Category::create([
            'name' => 'Communication',
        ]);

        Category::create([
            'name' => 'Consultancy',
        ]);

        Category::create([
            'name' => 'Economics',
        ]);

        Category::create([
            'name' => 'Agriculture',
        ]);

        Category::create([
            'name' => 'Hotel',
        ]);

        Category::create([
            'name' => 'Tourism',
        ]);

        Category::create([
            'name' => 'Journalism',
        ]);

        Category::create([
            'name' => 'Civil Engineering',
        ]);
    }
}
