<?php
use App\Category as Category;
use App\Purchase;
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

if(!function_exists('get_suppliers_data')){
    function get_suppliers_data($supplier_id){
        $data = Purchase::where('supplier_id', $supplier_id)->get();
        return $data;
    }
}