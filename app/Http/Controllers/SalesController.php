<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;


class SalesController extends Controller
{
    public function store(Request $request){

        dd($request->toArray());

    }

    public function show_sales_form(){

        $products= Product::all();

        return view('sale',compact('products'));
    }

    public function saleProduct($id){

        $products = Product::where('id',$id)->first();

        $html = "
                <tr id='product_row_$products->id'>
                    <input type='hidden' name='product_id$products->id' value='$products->id'>
                    <td>$products->product_name</td>
                    <td>$products->product_description</td>
                    <td><input type='number' name='quantity' class='sell_quantity $products->id' id='quantity_$products->id' value='1' onkeyup='total_price(this.id)'></td>
                    <td><input type='number' name='price' value='$products->retail_rate' class='sell_price $products->id' id='price_$products->id' onkeyup='total_price(this.id)'></td>
                    <td class='sell_total_price' id='total_price_$products->id'>$products->retail_rate</td>
                    <td><button class='btn btn-sm btn-outline-danger remove' id='remove_$products->id' type='button' onclick='remove_row(this.id)'>x</button></td>
                </tr>
        
        ";

        return $html;




    }


}
