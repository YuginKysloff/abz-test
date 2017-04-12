<?php

use Illuminate\Database\Seeder;

class WorkersTableSeeder extends Seeder
{
    /**
     * Create workers
     *
     * @return void
     */
    public function run()
    {
        App\Worker::create([
            'post_id' => 1,
            'parent_post_id' => 0,
            'name' => 'Иванов Иван Иванович',
            'salary' => 10000
        ]);
        factory(App\Worker::class, 999)->create();
    }
}
