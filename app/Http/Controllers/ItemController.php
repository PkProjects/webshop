<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{
    public function show(Item $item)
    {
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

}
