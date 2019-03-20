<?php
use App\Category as Category;
use App\Purchase;
use App\Sales_entry;
use Illuminate\Support\Facades\DB;
use App\Purchase_history;
use App\Product as Product;


if(!function_exists('parent_cate_name')){
    function parent_cate_name($args){
        if(isset($args)):
            $data = Category::where('id',$args)->first();
            return $data['category_name'];
        else:
            return "";
        endif;
    }
}

if (!function_exists('cat_name')){
    function cat_name($category_id){
        if (isset($category_id)){
            $data = Category::where('id',$category_id)->first();
            return $data['category_name'];
        }else{
            return "";
        }
    }
}

if(!function_exists('get_suppliers_data')){
    function get_suppliers_data($supplier_id){
        $data = Purchase::where('supplier_id', $supplier_id)->get();
        return $data;
    }  
}

if (!function_exists('get_suppliers_history')){
    function get_suppliers_history($supplier_id){
        $histories = Purchase_history::where('supplier_id',$supplier_id)->paginate(10);
        return $histories;
    }
}

if (!function_exists('get_customers_data')){
    function get_customers_data($customer_id){
        $data = Sales_entry::where('customer_id',$customer_id)->paginate(10);
        return $data;
    }
}

if (!function_exists('get_suppliers_purchase_date')){
    function get_suppliers_purchase_date($purchase_id){
        $data = DB::table('purchases')->select('created_at')->where('id',$purchase_id)->first();
        return $data;
    }
}

if (!function_exists('customer_total_due')){
    function customer_total_due($customer_id){
        $data = DB::table('sales_entries')->where('customer_id','=',$customer_id)->sum('due_amount');
        return $data;
    }
}



if(!function_exists('get_total_products')){
    function get_total_products($arg){
        $count = Product::where('product_name', $arg)->count();
        return $count;
    }
}