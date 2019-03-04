<?php

namespace App\Http\Controllers;
use App\Category;
use APP\Brand;
use App\Product;
use App\Supplier;
use App\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $product=DB::table('product')
      ->join('categories','product.category_id','=','categories.id')
      ->join('brands','product.brand_id','=','brands.id')
      ->join('suppliers','product.supplier_id','=','suppliers.id')
      ->select('product.*','categories.category_name','brands.brand_name','suppliers.supplier_name')->get();
        return view('show_products',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where('parent_status','=',0)->get();
        $sub_category = Category::where('parent_status','=',1)->get();
        $brands = Brand::all();
        $suppliers = Supplier::all();

        return view('add_products', compact('category','sub_category','suppliers','brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request['user_id'] = Auth::user()->id;

        if ($request['imei_1'] && $request['imei_2'] != null){

            $request['product_imei'] = $request['imei_1'].','.$request['imei_2'];
        }
        elseif ($request['imei_1'] !=null && $request['imei_2'] == null){
            $request['product_imei'] = $request['imei_1'];
        }
        elseif ($request['imei_2'] !=null && $request['imei_1'] == null){
            $request['product_imei'] = $request['imei_2'];
        }
        else{
            $request['product_imei'] = null;
        }

        $request->validate([
            'product_name' =>'required',
            'category_id' => 'required',
            'supplier_id' => 'required',
            'purchase_rate' => 'required',
            'retail_rate' => 'required',
        ]);

        $all =$request->except(['imei_1','imei_2']);

        Product::create($all);

        return redirect('products/create');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $all=$request->all();
        $updateData=Product::findOrfail($id);
        $updateData->update($all);
        return redirect('products/create');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(products $id)
    {
        $deleteData=Product::findOrfail();
        $deleteData->delete($id);
        return redirect('products/create');

    }
}
