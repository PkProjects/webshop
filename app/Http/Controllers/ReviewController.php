<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function create()
    {
       
    }

    public function store(Request $request, Item $item)
    {
        Review::create([
            'user_id'   =>  $request->user_id,
            'item_id'   =>  $request->item_id,
            'pros'      =>  $request->pros,
            'cons'      =>  $request->cons,
            'review'    =>  $request->review,
            'rating'    =>  $request->rating
        ]);

        return redirect()->route('item.show', $request->item_id)
    ->with('success','Thank you for your review');
    }
}
