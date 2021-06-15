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
            'name' => $request->name,
            'adress' => $request->adress,
            'phone_number' => $request->phone_number,
            'email' => $request->email
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

}
