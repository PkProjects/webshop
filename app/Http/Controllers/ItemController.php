<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Exception;
use Illuminate\Support\Facades\Session;

class ItemController extends Controller
{
    public function show(Item $item)
    {
         dd(session('cart'));
    return view ('item.show',[
    'item'      => $item,
    'reviews'   => $item->reviews()
    ]);
}

    public function edit(Item $item)
    {

        return view ('item.edit',[
            'item' => $item,
        ]);
    }

    public function update(Request $request, Item $item)
    {
        $item->update([
            'name' => $request->name,
            'price' => $request->price,
            'summary' => $request->summary,
            'supply' => $request->supply
        ]);

        return redirect(route('item.show', $item));   
    }

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
}
