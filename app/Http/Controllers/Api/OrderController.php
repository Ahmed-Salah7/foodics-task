<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function create(Request $request){

       $product = Product::findOrFail($request->product_id);
        $ingredients = $product->ingredients;

        foreach($ingredients as $ingredient){
            if($ingredient->available_quantity_gram < $ingredient->pivot->quantity_gram){
                return Response()->error('does not have enough ingredients');
            }
        }

        $order = Order::create([]);
        $order->products()->attach($request->product_id, ['quantity'=>$request->quantity]);

        foreach($ingredients as $ingredient){
            $ingredient->available_quantity_gram = $ingredient->available_quantity_gram - $ingredient->pivot->quantity_gram;
            $ingredient->save();

            if(!$ingredient->sent_alert && ($ingredient->full_stock  / 2 ) <= $ingredient->available_quantity_gram ){
                $details = [
                    'title' => 'We have a component deficit',
                    'body' => 'We have a component deficit In => '.$ingredient->name
                ];
                \Mail::to('merchant@gmail.com')->send(new \App\Mail\IngredientAlertMail($details));
                $ingredient->sent_alert =1;
                $ingredient->save();
            }
        }
        return Response()->ok('Order created successfully');
    }
}
