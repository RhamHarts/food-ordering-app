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
        $menus = [
            [
                'name' => 'Nasi Goreng',
                'description' => 'Nasi goreng spesial dengan bumbu rahasia',
                'price' => 20000,
                'image' => 'nasi-goreng.jpg'
            ],
            [
                'name' => 'Mie Goreng',
                'description' => 'Mie goreng dengan bumbu khas',
                'price' => 20000,
                'image' => 'mie-goreng.jpeg'
            ],
            [
                'name' => 'Ayam Bakar',
                'description' => 'Ayam bakar dengan bumbu spesial',
                'price' => 30000,
                'image' => 'ayam-bakar.jpg'
            ],
            [
                'name' => 'Es Teh',
                'description' => 'Es teh manis segar',
                'price' => 5000,
                'image' => 'es-teh.jpeg'
            ]
        ];

        foreach ($menus as $menu) {
            Menu::create($menu);
        }
    }
}
