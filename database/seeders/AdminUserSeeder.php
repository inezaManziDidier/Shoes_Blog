<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        User::insert([
            [
                'name' => 'administrator',
                'email' => 'admin@admin.com',
                'password' => Hash::make('admin'), // admin
                'is_admin' => true
            ]
        ]);
    }
}
