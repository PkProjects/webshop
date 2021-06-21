<?php

namespace App\Http\Controllers;

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
        $order->update([
            'item_array' => $request->item_array,
            'total_cost' => $request->total_cost,
            'delivery_adress' => $request->delivery_adress,
            'processed' => $request->processed
        ]);

        return redirect('/users/');   
        //return redirect('user');    
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
        $order = $request->item_array;
        //dd($order);
        return view('order.finish', [
            'item_array' => $order
        ]);    
    }

}
