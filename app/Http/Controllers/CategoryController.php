<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

    $categories = Category::all();
    return view('category.index', [
        'categories' => $categories
    ]);
    }

    public function show(Category $category)
    {
    return view ('category.show',[
    'category'  => $category,
    'items'     => $category->items,
    ]);
    }

    public function sort(Request $request, Category $category){
        $sortedItems = $category->items;
        if($request->itemOrder == 1){
            $sortedItems = $category->items->sortBy('price');
        } else if($request->itemOrder == 2){
            $sortedItems = $category->items->sortByDesc('price');
        } else if($request->itemOrder == 3){
            $sortedItems = $category->items->sortBy('name');
        } else if($request->itemOrder == 4){
            $sortedItems = $category->items->sortByDesc('name');
        }
        //dd($sortedItems);
        return view ('category.show',[
            'category'  => $category,
            'items'     => $sortedItems,
        ]);
    }

}
