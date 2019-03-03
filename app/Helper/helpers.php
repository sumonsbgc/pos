<?php
use App\Category as Category;

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