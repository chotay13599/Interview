<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('admin.home');
        $categories=Category::all();
        $items = Item::all();
        // $items = [];
        // $index = 0;
        // foreach($categories as $category){
        //     if($category->items != null){
        //         $items[$index] = count($category->items);
        //     }else{
        //         $items[$index] = 0;
        //     }
        //     $index++;
        // }
        // dd($items);
        // dd($categories,$items);
        // $count = DB::table('items')
        //         ->select('category_id', DB::raw('count(*) as total'))
        //         ->groupBy('category_id')
        //         ->get();

        // dd($count);
        return view('index',['categories'=>$categories,'items' => $items]);

    }
}
