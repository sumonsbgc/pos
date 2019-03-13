<?php

namespace App\Http\Controllers;

use App\Sales_entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function product_invoice($receipt_no){

        $all  = DB::table('sales_entries')
            ->join('product','sales_entries.product_id','=','product.id')
            ->select('product.product_name','product.product_description','product.product_imei as imei','product.color','sales_entries.*')
            ->where('sales_entries.receipt_no','=',$receipt_no)->get();

//            dd($all);


        return view('invoice', compact('all','receipt_no','total_amount'));

    }
}
