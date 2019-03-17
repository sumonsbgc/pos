<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Sales_entry;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allCustomer = Customer::all();

        return view('customers',compact('allCustomer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->all();
        Customer::create($all);

        $message =1;

        return back()->with('message',$message);
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
        $newData = $request->all();

        $old = Customer::findorfail($id);

        $old->update($newData);

        $sale_entries_update = Sales_entry::where('customer_id',$id)->get();

        if ($sale_entries_update != null){

            foreach ($sale_entries_update as $sale_entry){

                $sale_entry->customer_name = $request->customer_name;
                $sale_entry->customer_contact_no = $request->mobile_no;
                $sale_entry->customer_add = $request->address;

                $sale_entry->save();

            }

        }

        $update =1;

        return back()->with('update',$update);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $find = Customer::findorfail($id);

        $sale = Sales_entry::where('customer_id',$id)->get();


        if ($sale->isNotEmpty()){
            $delete = 1;
            return back()->with('delete',$delete);
        }else{
            $find->delete();
            $deleted = 5;
            return back()->with('deleted',$deleted);
        }
    }

    public function pay_due_amount(Request $request){

        $sales_entries = Sales_entry::where('id',$request->sale_id)->first();
        $new = $sales_entries['receive_amount'] + $request->paid;
        $due = $sales_entries['due_amount'] - $request->paid;

        $sales_entries['receive_amount'] = $new;
        $sales_entries['due_amount'] = $due;

        $sales_entries->save();

        return array($new,$due);
    }
}
