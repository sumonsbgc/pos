<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class SalesController extends Controller
{

    public function addToSale($id){

        $product = Product::where('id',$id)->first();

        session()->push('select_product',$product);

        return session('select_product');


    }

    public function show_sales_form(){

        $products= session('select_product');

        return view('sale',compact('products'));
    }

}
