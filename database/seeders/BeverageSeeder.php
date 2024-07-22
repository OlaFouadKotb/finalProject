<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Beverage;
class BeverageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beverage::create([
            'title' => 'Iced Americano',
            'content'=>'for cool and refresh ',
            'price' => 10.25,
            'published'=>'1',
           'special'=>'0',
            'image' => 'assets/image/iced-americano.png',
            'category'=>'Iced Coffee'
        ]);
    }
}
