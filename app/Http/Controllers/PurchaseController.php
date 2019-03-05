<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseController extends Controller
{

    public function show_purchase_form(){

        $allSupplier = Supplier::all();

        return view('create_purchase',compact('allSupplier'));

    }

    public function store_purchase_notes(Request $request){

        $details = htmlentities($request->product_details);

        $request->product_details = $details;

        $all = $request->except('files');

        Purchase::create($all);

        return redirect('create_purchase');

    }

    public function show_purchase_notes(){

        $all = DB::table('purchases')
            ->select('purchases.*','suppliers.supplier_name','suppliers.company_name','suppliers.present_add', 'suppliers.mobile_no')
            ->join('suppliers','purchases.supplier_id','=','suppliers.id')->paginate(5);

        return view('show_purchase',compact('all'));

    }

}
