<?php

namespace App\Http\Controllers;
use App\servicing;
use Illuminate\Http\Request;

class servicing_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('add_servicing_product');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('add_servicing_product');
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
            'customer_name'=>'required',
            'product_name'=>'required',
            'address'=>'required',
            'mobile'=>'required'

        ]);
        $store=$request->all();
        servicing::create($store);
        $message=1;
        return redirect('servicing')->with('message',$message);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $all=servicing::all();
        return view('show_servicing_products',compact('all'));
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
        $updataData=servicing::findOrfail($id);
        $updataData->customer_name=$request->customer_name;
        $updataData->address=$request->address;
        $updataData->mobile=$request->mobile;
        $updataData->product_name=$request->product_name;
        $updataData->service_charge=$request->service_charge;
        $updataData->paid=$request->paid;
        $updataData->due=$request->due;
        $updataData->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteData=servicing::findOrfail($id);
        $deleteData->delete();
        return back();
    }
}