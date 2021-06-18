<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Exception;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function addToCart(Request $request, Item $item){

        try{
            $validated = $request->validate([
                'item' => 'required'
            ]);
            //$request->session()->forget('cart');

            $request->session()->push( 'cart', [$item->id => 1] );

            return response()->json([
                'succes' => true
            ]);
        } catch(Exception $e){

            return response()->json([
                'succes' => false,
                'request' => $request->item,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function show()
    {
        $cart = session('cart');
        $cartArray = [];
        foreach($cart as $item){
            foreach($item as $id => $amount){
                $cartArray[] = Item::where('id', $id)->get();
            };
        };

        return view('cart.show', [
            'cartArray' => $cartArray
        ]);    
    }

}
