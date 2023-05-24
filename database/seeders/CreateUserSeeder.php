<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Donor',
                'username' => 'wahyu0',
                'password' => Hash::make('78945123'),
                'role' => 0
            ],
            [
                'name' => 'Raiser',
                'username' => 'wahyu1',
                'password' => Hash::make('78945123'),
                'role' => 1
            ],
            [
                'name' => 'Admin',
                'username' => 'wahyu2',
                'password' => Hash::make('78945123'),
                'role' => 2
            ],
        ];
        foreach($users as $user){
            User::create($user);
        }
    }
}
