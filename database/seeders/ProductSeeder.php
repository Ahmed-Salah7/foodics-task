<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\IngredientProduct;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Product::create([
            'name'=> 'Burger',
        ]);

        IngredientProduct::create([
            'product_id'=> 1,
            'ingredient_id'=>1 ,
            'quantity_gram'=> 150,
        ]);

        IngredientProduct::create([
           'product_id'=> 1,
            'ingredient_id'=>2,
           'quantity_gram'=> 30,
        ]);

        IngredientProduct::create([
           'product_id'=> 1,
            'ingredient_id'=>3,
           'quantity_gram'=> 20,
        ]);


    }
}
