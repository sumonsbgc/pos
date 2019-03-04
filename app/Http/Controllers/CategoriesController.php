<?php

namespace App\Http\Controllers;
use App\Category;

use Illuminate\Http\Request;
use App\Brand;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::where('parent_status','=',0)->get();
        $all=Category::all();
        return view('categories',compact('all','category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('categories');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $store=$request->validate([
            'category_name'=>'required',
            'parent_status' => 'required'
        ]);

        Category::create($store);
            // 'category_name' => $request->category_name,
            // 'parent_status' =>$request->parent_name
            return redirect('categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $updateData=Category::findorfail($id);
        $updateData->update($newData);       
        return redirect('categories');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData=Category::findOrfail($id);
        $deleteData->delete();
        return redirect('categories');

    }



    public function changingSubCat($id){
        $subCategories =  Category::where('parent_status', '=', $id)->get();
        $html1 =[];
        $html2 =[];

        foreach ($subCategories as $subcategory){
            array_push($html1, "<option value='$subcategory->id'>$subcategory->category_name</option>");
//            $html1[] = "<option value='$subcategory->id'>$subcategory->category_name</option>";

            if (Brand::all() != null){
                $brands =  Brand::where('category_id', '=', $subcategory->id)->get();

                foreach ($brands as $brand){
                    array_push($html2, "<option value='$brand->id'>$brand->brand_name</option>");
    //                $html2[] = "<option value='$brand->id'>$brand->brand_name</option>";
                }

            }

        }

        return array($html1, $html2);

    }

    public function changingProductBrands($id){

        if (Brand::all() !=null){

        $brands =  Brand::where('category_id', '=', $id)->get();

        $html =[];


        foreach ($brands as $brand){

            $html[] = "<option value='$brand->id'>$brand->brand_name</option>";

        }

//        dd($html2);

        return $html;

        }

    }

}
