<?php

use Illuminate\Database\Seeder;

class TaskTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 50; $i++) {
            App\Task::create([
                'name' => 'task_'.$i,
                'description' => 'description of task'.$i,
                'status' => mt_rand(1,3)
            ]);
        }
    }
}
