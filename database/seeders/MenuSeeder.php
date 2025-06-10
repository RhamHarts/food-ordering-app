<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::create([
            'name' => 'Nasi Goreng',
            'description' => 'Nasi goreng dengan ayam dan telur',
            'price' => 15000,
            'image' => 'nasi-goreng.jpg'
        ]);
    }
}
