<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Create posts
     *
     * @return void
     */
    public function run()
    {
        $posts = ['Директор', 'Нач.департамента', 'Нач.отдела', 'Бригадир', 'Сотрудник'];
        for($i = 0; $i < 5; $i++) {
            App\Post::create([
                'name' => $posts[$i]
            ]);
        }
    }
}