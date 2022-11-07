<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userRecords = [
            ['id' => 1, 'name' => 'Admin Admin', 'email' => 'admin@gmail.com', 'password' => '$2y$10$GORYuXIAkNiPV.xo/nApo.8KuB8bJPpIvhvjLORy4Ih3QQWuyAdwC', 'created_at' => \Carbon\Carbon::now(), 'updated_at' => \Carbon\Carbon::now()], 
            
        ];

        User::insert($userRecords);
    }
}
