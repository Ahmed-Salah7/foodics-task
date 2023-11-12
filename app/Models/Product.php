<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable =['name'];

    public function ingredients(){
        return $this->belongsToMany(Ingredient::class , 'ingredient_products')->withPivot('quantity_gram');
    }
}
