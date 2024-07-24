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
            'image' => 'assets/img/iced-americano.png',
            'category'=>'Iced Coffee'
        ]);
        Beverage::create([
            'title' => 'cappicciono',
            'content'=>'coffee with milk ',
            'price' => 10.25,
            'published'=>'1',
           'special'=>'0',
            'image' => 'assets/img/hot-cappuccino.png',
            'category'=>'hot Coffee'
        ]);
        Beverage::create([
            'title' => 'smoothie1',
            'content'=>' ',
            'price' => 11.25,
            'published'=>'1',
           'special'=>'0',
            'image' => 'assets/img/smoothie-3.png',
            'category'=>'juice'
        ]);
    }
}
