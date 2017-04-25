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
        $faker = Faker\Factory::create('Ru_ru');

        App\Worker::create([
            'pid' => 0,
            'post_id' => 1,
            'name' => $faker->name,
            'salary' => 10000,
            'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = '-2 years', $timezone = 'UTC'),
            'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'UTC'),
        ]);

        for ($i = 0; $i < 10; $i++) {
            App\Worker::create([
                'pid' => 1,
                'post_id' => 2,
                'name' => $faker->name,
                'salary' => 5000,
                'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = '-2 years', $timezone = 'UTC'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'UTC'),
            ]);
        }

        for($i = 0; $i < 300; $i++) {
            App\Worker::create([
                'pid' => mt_rand(2, 11),
                'post_id' => 3,
                'name' => $faker->name,
                'salary' => 3000,
                'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = '-2 years', $timezone = 'UTC'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'UTC'),
            ]);
        }

        for($i = 0; $i < 1000; $i++) {
            App\Worker::create([
                'pid' => mt_rand(11, 311),
                'post_id' => 4,
                'name' => $faker->name,
                'salary' => 1000,
                'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = '-2 years', $timezone = 'UTC'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'UTC'),
            ]);
        }

        for($i = 0; $i < 48689; $i++) {
            App\Worker::create([
                'pid' => mt_rand(311, 1311),
                'post_id' => 5,
                'name' => $faker->name,
                'salary' => 500,
                'created_at' => $faker->dateTimeBetween($startDate = '-5 years', $endDate = '-2 years', $timezone = 'UTC'),
                'updated_at' => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now', $timezone = 'UTC'),
            ]);
        }
    }
}
