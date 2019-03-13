<?php

namespace App\Http\Controllers;

use App\Purchase;
use App\Purchase_history;
use Illuminate\Http\Request;

class PurchaseHistoryController extends Controller
{

    public function purchase_history_store(Request $request){

        $purchase_id = $request['purchase_id'];
        $paid = $request['paid'];

        $all_info = Purchase::where('id',$purchase_id)->first();

        $request['supplier_id'] = $all_info['supplier_id'];

        $all_request = $request->all();

        Purchase_history::create($all_request);

        $new_cash = $all_info['cash_purchase'] + $paid;
        $new_due = $all_info['credit_purchase'] - $paid;

        $all_info['cash_purchase'] = $new_cash;
        $all_info['credit_purchase'] = $new_due;

        $all_info->save();

        return array($new_cash, $new_due);


    }

}
