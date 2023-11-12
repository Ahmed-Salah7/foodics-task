<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Ingredient::create([
           'name'=> 'beef',
           'available_quantity_gram'=>20000 ,
           'full_stock'=>20000 ,
        ]);

        Ingredient::create([
           'name'=> 'cheese',
           'available_quantity_gram'=> 5000,
           'full_stock'=> 5000,
        ]);
        Ingredient::create([
           'name'=> 'onion',
           'available_quantity_gram'=> 1000,
           'full_stock'=> 1000,
        ]);
    }
}
