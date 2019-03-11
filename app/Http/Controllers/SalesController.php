<?php

namespace App\Http\Controllers;

use App\Product;
use App\Sales_entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class SalesController extends Controller
{
    public function store(Request $request){

//        dd($request);

        $current_date = date('ym');

        $generate_num = $current_date. '00';

        $single_data = Sales_entry::all();


        if (isset($single_data->last()->receipt_no)){
            $receipt = $single_data->last()->receipt_no;
            $receipt_first_four = $receipt[0] . $receipt[1] . $receipt[2] . $receipt[3];

            if ($receipt_first_four != $current_date){
                $receipt_no = $generate_num . 1;
            }
            else{
                $receipt_no = $receipt + 1;
            }
        }else{
            $receipt_no = $generate_num . 1;
        }




        $products_id = $request->pro_id;
        $quantity = $request->qty;
        $rate = $request->rate;

        $count_p_id = count($products_id);

        if ($count_p_id > 1){

            for ($i = 0; $i < $count_p_id; $i++){

                $request->validate([
                    'pro_id' =>'required',
                    'qty' =>'required',
                    'rate' =>'required',
                    'customer_name'=>'required',
                    'customer_contact_no'=>'required',
                    'customer_add'=>'required'
                ]);

                $request['receipt_no'] = $receipt_no;
                $request['user_id'] = Auth::user()->id;

                $request['product_id'] = $products_id[$i];
                $request['sale_quantity'] = $quantity[$i];
                $request['retail_rate'] = $rate[$i];

                $all = $request->except('pro_id','qty','rate');

                Sales_entry::create($all);

            }

        }
        else{
            $request->validate([
                'pro_id' =>'required',
                'qty' =>'required',
                'rate' =>'required',
                'customer_name'=>'required',
                'customer_contact_no'=>'required',
                'customer_add'=>'required'
            ]);

            $request['receipt_no'] = $receipt_no;
            $request['user_id'] = Auth::user()->id;

            $request['product_id'] = $products_id[0];
            $request['sale_quantity'] = $quantity[0];
            $request['retail_rate'] = $rate[0];

            $all = $request->except('pro_id','qty','rate');

            Sales_entry::create($all);
        }

        return redirect('product_invoice/'.$receipt_no);


    }

    public function show_sales_form(){

        $products= Product::all();

        return view('sale',compact('products'));
    }

    public function saleProduct($id){

        $products = Product::where('id',$id)->first();

        $html = "
                <tr id='product_row_$products->id'>
                    <input type='hidden' name='pro_id[]' value='$products->id'>
                    <td>$products->product_name</td>
                    <td>$products->product_description</td>
                    <td class='t-column'><input type='number' name='qty[]' class='quantity $products->id' id='quantity_$products->id' value='1' onkeyup='total_price(this.id)'></td>
                    <td class='t-column'><input type='number' name='rate[]' value='$products->retail_rate' class='sell_price $products->id' id='price_$products->id' onkeyup='total_price(this.id)'></td>
                    <td class='sell_total_price' id='total_price_$products->id'>$products->retail_rate</td>
                    <td><button class='btn btn-sm btn-outline-danger remove' id='remove_$products->id' type='button' onclick='remove_row(this.id)'>x</button></td>
                </tr>
        
        ";

        return $html;

    }

    public function sales_history(){

        $all  = Sales_entry::all()->unique('receipt_no');

        return view('sales_history',compact('all'));

    }
}
