<?php
use App\Category as Category;
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


if(!function_exists('get_total_products')){
    function get_total_products($arg){
        $count = Product::where('product_name', $arg)->count();
        return $count;
    }
}