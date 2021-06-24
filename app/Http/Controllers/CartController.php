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
        $cartArray = [];;
        $testItems = Item::all();
        if($cart != null){
            foreach($cart as $item){
                foreach($item as $id => $amount){
                    //$testItem = Item::where('id', $id)->get()
                    $testItem = $testItems->find($id);
                    $testItem->quantity = $amount;
                    //dd($testItem);
                    $cartArray[] = $testItem;
                };
            };
        }
        //dd($cartArray);
        return view('cart.show', [
            'cartArray' => $cartArray
        ]);    
    }

    public function delete(Request $request, $index){
        $tempArray = $request->session()->get('cart');
        $i = 0;
        $request->session()->forget('cart');
        foreach($tempArray as $subArray){
            if($i != $index)
            {
                $request->session()->push('cart', $subArray);
            } 
            $i++;
        }
        return redirect(route('cart.show'));
    }

    public function add(Request $request, $index){

        try{
            $tempValue = $request->session()->get('cart.'.$index);
            foreach($tempValue as $key => $value){
                $tempValue[$key] += 1;
            }
            $request->session()->put('cart.'.$index, $tempValue);

            return response()->json([
                'succes' => true,
                'test' => $request->session()->get('cart.'.$index),
                'redirect' => route('cart.show')
            ]);
        } catch(Exception $e){

            return response()->json([
                'succes' => false,
                'request' => $request->item,
                'message' => $e->getMessage()
            ]);
        }

    }

    public function sub(Request $request, $index){

        try{
            $tempValue = $request->session()->get('cart.'.$index);
            foreach($tempValue as $key => $value){
                $tempValue[$key] -= 1;
            }
            $request->session()->put('cart.'.$index, $tempValue);

            return response()->json([
                'succes' => true,
                'test' => $request->session()->get('cart.'.$index),
                'redirect' => route('cart.show')
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
