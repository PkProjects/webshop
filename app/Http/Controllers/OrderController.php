<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function edit(Order $order)
    {
        return view('order.edit', [
            'order' => $order,
        ]);   
    }

    public function show(Order $order)
    {
        $orders = Order::all();
        return view('order.info', [
            'orders' => $orders
        ]);    
    }

    public function store(Request $request){
        $order = Order::create([
            'item_array'      => $request->item_array,
            'user_id'      => $request->user_id,
            'total_cost' => $request->total_cost,
            'delivery_adress' => $request->delivery_adress,
            'processed' => 0
        ]);

        $request->session()->forget('cart');
        return redirect('/user/'. auth()->user()->id);   
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $tempArray = [];
        $tempArray2 = json_decode($request->item_array);

        foreach(json_decode($request->item_array) as $item){
            $tempArray[] = $item->id;
        }
        foreach($tempArray as $id){
            foreach($tempArray2 as $item){
                if($item->id == $id){
                    $item->quantity = $request->{"item" . $id};
                }
            }
        }

        $order->update([
            'item_array' => json_encode($tempArray2),
            'total_cost' => $request->total_cost,
            'delivery_adress' => $request->delivery_adress,
            'processed' => $request->processed
        ]);

        return redirect('/orders/');   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
    }

    public function finish(Request $request){

        $cart = session('cart');
        $cartArray = [];
        $testItems = Item::all();
        $totalPrice = 0;
        if($cart != null){
            foreach($cart as $item){
                foreach($item as $id => $amount){
                    $testItem = $testItems->find($id);
                    $testItem->quantity = $amount;
                    $cartArray[] = $testItem;
                    $totalPrice += ($testItem->price * $amount);
                };
            };
        }

        return view('order.finish', [
            'item_array' => $cartArray,
            'total_price' => $totalPrice
        ]);    
    }

}
