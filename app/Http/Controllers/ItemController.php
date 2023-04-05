<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Category;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        return $this->middleware('auth');
    }
    public function index()
    {
        //
        return view('admin.item.index',['items' => Item::paginate(3)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.item.create',['categories'=>Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ItemRequest $request)
    {
        //
       
            // dd($request->all());

            $data=$request->except("_token");
            $data['publish'] = (isset($request->publish))? 1 : 0 ;
            $file=$request->file('img');
            $name=$file->getClientOriginalName();
            $new_name=time().$name;
            $data['img'] = $new_name;

            $destinationPath=public_path().'/img';
            if($file->move($destinationPath,$new_name)){
                if(Item::create($data)){
                    return redirect()->route('item.index');

                }
            }
        return redirect()->route('item.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
        // dd($item);
        // return view('item_detail',['item' => $item,'categories' => Category::all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
        return view('admin.item.edit',['item'=>$item,'categories' => Category::all()]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(ItemRequest $request, Item $item)
    {
        //
          $updated = false;
          $data=$request->except(["_token","_method"]);
          $data['publish'] = (isset($request->publish))? 1 : 0 ;
          $data['description'] =$request->description;

          

          if ($request->hasFile('img')) {
                // $imageName=time().'.'.$request->img->getClientOriginalName();
                // $request->img->storeAs('public/images/',$imageName);
                $file=$request->file('img');
                $name=$request->file('img')->getClientOriginalName();
                $new_name=time().$name;
            
                $destinationPath=public_path().'/img';
                $data['img'] = $new_name;

                if($file->move($destinationPath,$new_name)){
                   $updated = $item->update($data);
                }
            }
            else{
                $updated = $item->update($data);
            }

           if($updated){
                return redirect()->route('item.index');
           }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        if($item->delete()){
            return redirect()->route('item.index');
        }
    }
}
