<?php

namespace App\Http\Controllers;

use App\Expenses;
use App\Product;
use App\Purchase;
use App\Sales_entry;
use App\Supplier;
use function GuzzleHttp\Psr7\str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IndexController extends Controller
{

    public function dashboard(){

        $total_products = Product::where('status','0')->count('id');

        $total_sale = Sales_entry::all()->sum('sale_quantity');

        $total_purchase_count = Purchase::all()->count('id');

        $total_expense = Expenses::all()->sum('amount');
        $total_purchase = Purchase::all()->sum('total_amount');

        $total_profit = $total_sale - ($total_expense + $total_purchase);

        if ($total_profit > 0){
            $profit = $total_profit;
        }else{
            $profit = 0;
        }

        $recent_supplier = DB::table('purchases')
            ->join('suppliers','purchases.supplier_id','=','suppliers.id')
            ->select('purchases.id','suppliers.supplier_name','suppliers.company_name','purchases.total_amount')->orderBy('id','desc')->limit(5)->get();

        $recent_sell = DB::table('sales_entries')
            ->join('product','sales_entries.product_id','=','product.id')
            ->select('sales_entries.receipt_no','sales_entries.customer_name','sales_entries.sale_quantity','sales_entries.retail_rate','sales_entries.receive_amount','sales_entries.due_amount','product.product_name')->orderBy('receipt_no','desc')->limit(6)->get();

        $total_paid =DB::table('sales_entries')
                ->whereRaw('(retail_rate * sale_quantity) = receive_amount')
            ->count();

        $total_unpaid = DB::table('sales_entries')
            ->whereRaw('(retail_rate * sale_quantity) != receive_amount')
            ->count();

//        dd($total_paid);



        return view('index',compact('total_products','total_purchase_count','total_sale','profit','recent_supplier','recent_sell','total_paid','total_unpaid'));

    }

}
