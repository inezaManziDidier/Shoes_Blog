<?php

namespace Database\Seeders;

use App\Models\EmployerUser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class EmployerUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create Employer
        EmployerUser::insert([
            [
                'name' => 'Company X',
                'email' => 'employer@example.com',
                'password' => Hash::make('xxxxxxxx'), // xxxxxxxx
            ]
        ]);
        EmployerUser::insert([
            [
                'name' => 'Company Y',
                'email' => 'companyy@example.com',
                'password' => Hash::make('yyyyyyyy'), // yyyyyyyyy
            ]
        ]);
        EmployerUser::insert([
            [
                'name' => 'Company Z',
                'email' => 'companyz@example.com',
                'password' => Hash::make('zzzzzzzz'), // zzzzzzzz
            ]
        ]);
    }
}
