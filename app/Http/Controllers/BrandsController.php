<?php

namespace App\Http\Controllers;
use App\Brand;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all=Brand::all()->sortByDesc('id');
        $category = Category::where('parent_status','=',0)->get();
        $sub_category = Category::where('parent_status','=',1)->get();
        return view('brands',compact('all', 'category', 'sub_category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('brands');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $this->validate($request,[
            'brand_name'=>'required | unique:brands'
        ]);
        $store=$request->all();
        Brand::create($store);  
       $message=1;
        return redirect('brands')->with('message1',$message);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $newData=$request->all();

        $updateData=Brand::findorfail($id);

        $updateData->update($newData);

        $message=1;
        return redirect('brands')->with('message2',$message);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deletaData=brand::findorfail($id);

        $brands_has_product = Product::where('brand_id',$id)->get();

        if ($brands_has_product->toArray() == null){
            $deletaData->delete($deletaData);
            $message=1;
            return redirect('brands')->with('message3',$message);
        }else{
            $message=10;
            return redirect('brands')->with('message10',$message);
        }


    }
}
