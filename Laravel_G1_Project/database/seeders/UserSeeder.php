<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            ['name' => 'John'     ,'phone' => '09876545', 'email' => 'john@gmail.com', 'password' => '1234'],
            ['name' => 'JohnDue'  ,'phone' => '02345687', 'email' => 'john.due@gmail.com', 'password' => '1234'],
            ['name' => 'JohnWick' ,'phone' => '07776543', 'email' => 'john.wick@gmail.com', 'password' => '1234'],
            ['name' => 'JohnSmith','phone' => '06887654', 'email' => 'john.smith@gmail.com', 'password' => '1234'],
        ];
        foreach ($users as $user) {
            User::create($user);
        }
    }
}
