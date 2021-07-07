<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Item;
use Exception;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

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
            'supply' => $request->supply,
            'onSale' => $request->onSale,
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

    public function destroy(Item $item){
        $item->delete();

        return redirect(route('category.show', $item->category_id))
        ->with('success','Item deleted successfully');
    }

    public function create(){

        return view('item.create');
    }

    public function store(Request $request, Item $item){
        //$oldName = $request->image->getClientOriginalName();
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('img'), $imageName);

        Item::create([
            'name'          => $request->name,
            'price'         => $request->price,
            'summary'       => $request->summary,
            'category_id'   => $request->category_id,
            'image'         => $imageName,
            'supply'        => $request->supply,
            'properties'    => $request->properties,
            'onSale'        => $request->onSale,
        ]);

    return redirect(route('category.show', $request->category_id))
    ->with('success','Item added successfully');
    }
    public $reviewed = false;

    public function sale()
    {
        $items = Item::all()->where('onSale', '=', 'true');
        
        return view ('item.sale',[
        'items'     => $items,
        ]);
    }
}
