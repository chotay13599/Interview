<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemInfoController extends Controller
{
    //
    public function show($id)
    {
        //
        $item = Item::find($id);
        // dd($item);`
        return view('item_detail',['item' => $item,'categories' => Category::all()]);
    }
}
