<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Facades\DB;


class CategorySeeder extends Seeder
{
    public function run()
    {
        DB::table('categories')->insert([
            ['name' => 'Bebidas'],
            ['name' => 'Salgados'],
            ['name' => 'Entradas'],
            ['name' => 'Aperitivos'],
            ['name' => 'Sobremesas'],
            ['name' => 'Pratos principais'],
            ['name' => 'Vegetariano'],
            ['name' => 'Vegano'],
            ['name' => 'Peixes e frutos do mar'],
            ['name' => 'Carnes'],
        ]);

    
    }
}
