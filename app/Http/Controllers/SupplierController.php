<?php

namespace App\Http\Controllers;

use App\Product;
use App\Purchase_history;
use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $all = Supplier::leftJoin('purchases','suppliers.id','=','purchases.supplier_id')
//                ->select('suppliers.*','purchases.id as p_id','purchases.product_details','purchases.total_amount','cash_purchase','credit_purchase','transaction_type')
//                ->get();

        $all = Supplier::all();

        return view('show_supplier',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_supplier');
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
            'supplier_name'=>'required',
            'present_add'=>'required',
            'mobile_no'=>'required',
        ]);
        $all =$request->all();

        Supplier::create($all);
$message=1;
        return redirect('supplier/create')->with('message1',$message);
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
        $new  = $request->all();
        $old  = Supplier::findorfail($id);
        $old->update($new);
<<<<<<< HEAD
        $message=1;
        return redirect('supplier')->with('message2',$message);
=======
        $message=0;
        return redirect('supplier')->with('message1',$message);
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = Supplier::findorfail($id);
<<<<<<< HEAD

        $product_have_supplier = Product::where('supplier_id',$id)->get();


        if ($product_have_supplier->toArray() == null){

            $target->delete();
            $message=1;
            return redirect('supplier')->with('message3',$message);
        }else{
            $message = 4;

            return redirect('supplier')->with('message4',$message);
        }
=======
        $target->delete();
        $message=0;
        return redirect('supplier')->with('message2',$message);
>>>>>>> 8ad1e82d2d278c9277bf15faedc35138821eff59
    }
}
