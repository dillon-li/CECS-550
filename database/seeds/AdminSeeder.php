<?php

use Illuminate\Database\Seeder;
use CECS550\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      return User::create([
        'id' => 0,
        'name' => 'John Doe',
        'username' => 'UserAdmin',
        'email' => 'admin@cardinalgear.com',
        'password' => bcrypt('admin'),
        'gender' => 'male',
        'role' => 'admin',
        'confirmed' => 1
      ]);
    }
}
