<?php

use Illuminate\Database\Seeder;

class FlatsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 20; $i++) {
            App\Flat::create([
                'city' => 'City'.$i,
                'address' => 'address'.$i,
                'price' => mt_rand(100,1000),
                'image' => 'default.png'
            ]);
        }
    }
}
