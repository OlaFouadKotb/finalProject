<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Beverage;

class BeveragesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Beverage::create([
            'nameOfBeverage' => 'Test Beverage',
            'content' => 'This is a test beverage.',
            'price' => 10.00,
            'published' => true,
            'special' => false,
            'image' => 'test.jpg',
            'category' => 'Hot Coffee'
        ]);
    }
}
