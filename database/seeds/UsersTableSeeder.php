<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Create new user.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'login' => 'admin',
            'first_name' => 'admin',
            'last_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('123123')
        ]);
    }
}