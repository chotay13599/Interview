<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        return view('admin.category.index',['categories' => Category::paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->all());
        /*
        $imageName = time().'.'.$request->img->getClientOriginalName();
        $data = $request->except("_token");
        $data['img'] = $imageName;
        $data['publish'] = (isset($request->publish))? 1 : 0;
        dd($data);

        if($request->img->storeAs('uploads', $imageName,'public')){
            
            if(Category::create($data)){
            return redirect()->route('category.index');
            }
            // ->with('image',$imageName);
        }
        */

        $request->validate(
            [
                'name'=>"required",
                'img'=>"required|mimes:jpg,jpeg,png|max:200000",
                // 'publish'=>"required",
                
            ]
            );
            $data=$request->except("_token");
            $data['publish'] = (isset($request->publish))? 1 : 0 ;
            $file=$request->file('img');
            $name=$request->file('img')->getClientOriginalName();
            $new_name=time().$name;

            $destinationPath=public_path().'/img';
            $file->move($destinationPath,$new_name);

            Category::create([
                'name'=>$request->name,
                'img'=>$new_name,
                'publish'=>$data['publish'],
            ]);
            return redirect()->route('category.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
        return view('admin.category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
        
           /*
        if( $category->update($request->except('_token','_method'))){
            // $request->img->store('public/images');
            // $path = $request->img->hashName();
            // $category-> img= $path;
            // $category->save();
            return redirect()->route('category.index');
          }
          */

          $request->validate([
            'name'=>"required",
            'img'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:200000',
          ]);

          $data=$request->except("_token");
          $data['publish'] = (isset($request->publish))? 1 : 0 ;

          

          if ($request->hasFile('img')) {
                // $imageName=time().'.'.$request->img->getClientOriginalName();
                // $request->img->storeAs('public/images/',$imageName);
                $file=$request->file('img');
            $name=$request->file('img')->getClientOriginalName();
            $new_name=time().$name;
            
            $destinationPath=public_path().'/img';
            $file->move($destinationPath,$new_name);
                $category->update([
                    'img'=>$new_name,
                ]);
            }

            $category->update([
                'name'=>$request->name,
                'publish'=>$data['publish'],
                
                // other fields to update
            ]);

            return redirect()->route('category.index');




    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        if($category->delete()){
            return redirect()->route('category.index');
        }
    }
}
