<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(WorkersTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(TaskTableSeeder::class);
        $this->call(FlatsTableSeeder::class);
    }

}
