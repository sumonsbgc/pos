<?php

namespace App\Http\Controllers;

use App\Sales_entry;
use Illuminate\Http\Request;

class Accounts extends Controller
{
    public function search_account(Request $request, $days)
    {
        $from = date("Y-m-d", strtotime($request->from));
        $to = date("Y-m-d", strtotime($request->to));

        if (!is_null($request->from) && !is_null($request->to)) {
            $searchresult=DB::select("SELECT * FROM sales_entries WHERE created_at BETWEEN '$from%' AND '$to%' + INTERVAL 1 DAY");
            return $from;
        } else {
            $all_sell = Sales_entry::where('created_at', '>=', today()->subDays($days))->get();
            return $days;
        }
    }
}
