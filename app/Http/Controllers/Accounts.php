<?php

namespace App\Http\Controllers;

use App\Expenses;
use App\Purchase;
use App\Sales_entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Accounts extends Controller
{
    public function index(Request $request){

        $all_sale = Sales_entry::all();

        $all_purchase = Purchase::all();

        $all_expense = Expenses::all();

        $expense_quantity = DB::table('expenses')->count('id');
        $total_expense_amount = DB::table('expenses')->sum('amount');

        $purchase_quantity = DB::table('purchases')->count('id');
        $total_purchase_amount = DB::table('purchases')->sum('total_amount');
        $paid_purchase = DB::table('purchases')->sum('cash_purchase');
        $due_purchase = DB::table('purchases')->sum('credit_purchase');

        $sale_quantity = DB::table('sales_entries')->sum('sale_quantity');
        $total_sale = DB::table('sales_entries')->sum('retail_rate');
        $paid_sale = DB::table('sales_entries')->sum('receive_amount');
        $due_sale = DB::table('sales_entries')->sum('due_amount');

        $cost = $total_expense_amount + $total_purchase_amount;

        $total_cost = $cost - $total_sale;

        $loss = 0;

        $profit = 0;

        if ($total_cost > 0){
            $loss = abs($total_cost);
        }else{
            $profit = abs($total_cost);
        }
        //dd("slks");

        if ($request->from !=null && $request->to !=null){
            $request_to = date("Y-m-d", strtotime($request->to.'+ 1 day'));

            $from = date("Y-m-d", strtotime($request->from));

            $all_sale = DB::table('sales_entries')
                ->select('sales_entries.*')->whereBetween('created_at',[$from,$request_to])->get();

            $all_purchase = DB::table('purchases')
                ->select('purchases.*')->whereBetween('created_at',[$from,$request_to])->get();

            $all_expense = DB::table('expenses')
                ->select('expenses.*')->whereBetween('created_at',[$from,$request_to])->get();


            $expense_quantity = DB::table('expenses')->whereBetween('created_at',[$from,$request_to])->count('id');
            $total_expense_amount = DB::table('expenses')->whereBetween('created_at',[$from,$request_to])->sum('amount');

            $purchase_quantity = DB::table('purchases')->whereBetween('created_at',[$from,$request_to])->count('id');
            $total_purchase_amount = DB::table('purchases')->whereBetween('created_at',[$from,$request_to])->sum('total_amount');
            $paid_purchase = DB::table('purchases')->whereBetween('created_at',[$from,$request_to])->sum('cash_purchase');
            $due_purchase = DB::table('purchases')->whereBetween('created_at',[$from,$request_to])->sum('credit_purchase');

            $sale_quantity = DB::table('sales_entries')->whereBetween('created_at',[$from,$request_to])->sum('sale_quantity');
            $total_sale = DB::table('sales_entries')->whereBetween('created_at',[$from,$request_to])->sum('retail_rate');
            $paid_sale = DB::table('sales_entries')->whereBetween('created_at',[$from,$request_to])->sum('receive_amount');
            $due_sale = DB::table('sales_entries')->whereBetween('created_at',[$from,$request_to])->sum('due_amount');


            $cost = $total_expense_amount + $total_purchase_amount;

            $total_cost = $cost - $total_sale;

            $loss = 0;

            $profit = 0;

            if ($total_cost > 0){
                $loss = abs($total_cost);
            }else{
                $profit = abs($total_cost);
            }
        }elseif ($request->filter !=null){


            $days = today()->subDays($request->filter - 1);


            $all_sale = Sales_entry::where('created_at', '>=', $days)->get();
            $all_expense = Expenses::where('created_at', '>=', $days)->get();
            $all_purchase = Purchase::where('created_at', '>=', $days)->get();

            $expense_quantity = DB::table('expenses')->where('created_at', '>=', $days)->count('id');
            $total_expense_amount = DB::table('expenses')->where('created_at', '>=', $days)->sum('amount');

            $purchase_quantity = DB::table('purchases')->where('created_at', '>=', $days)->count('id');
            $total_purchase_amount = DB::table('purchases')->where('created_at', '>=', $days)->sum('total_amount');
            $paid_purchase = DB::table('purchases')->where('created_at', '>=', $days)->sum('cash_purchase');
            $due_purchase = DB::table('purchases')->where('created_at', '>=', $days)->sum('credit_purchase');

            $sale_quantity = DB::table('sales_entries')->where('created_at', '>=', $days)->sum('sale_quantity');
            $total_sale = DB::table('sales_entries')->where('created_at', '>=', $days)->sum('retail_rate');
            $paid_sale = DB::table('sales_entries')->where('created_at', '>=', $days)->sum('receive_amount');
            $due_sale = DB::table('sales_entries')->where('created_at', '>=', $days)->sum('due_amount');

            $cost = $total_expense_amount + $total_purchase_amount;

            $total_cost = $cost - $total_sale;

            $loss = 0;

            $profit = 0;

            if ($total_cost > 0){
                $loss = abs($total_cost);
            }else{
                $profit = abs($total_cost);
            }

        }

        return view('report_filter', compact('all_sale','all_purchase','all_expense','expense_quantity','total_expense_amount','purchase_quantity','total_purchase_amount','sale_quantity','total_sale','loss','profit','paid_purchase','due_purchase','paid_sale','due_sale'));
    }

    
}
