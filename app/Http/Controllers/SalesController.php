<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Product;
use App\Sales_entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class SalesController extends Controller
{
    public function store(Request $request){
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

        



        if ($request->customer_id == null){
            $insert_customer = $request->only('customer_name','mobile_no','phone_no','mail','address');

            Customer::create($insert_customer);
            $id = Customer::all()->last()->id;
            $customer_id = $id;

        }else{
            $customer_id = $request->customer_id;

            $customer_info = Customer::where('id',$customer_id)->first();
            $customer_name = $customer_info->customer_name;
            $customer_mobile_no = $customer_info->mobile_no;
            $customer_address = $customer_info->address;
        }

        $count_p_id = count($products_id);
        
        for ($i = 0; $i < $count_p_id; $i++){

            $request['receipt_no'] = $receipt_no;
            $request['user_id'] = Auth::user()->id;

            $request['product_id'] = $products_id[$i];
            $request['sale_quantity'] = $quantity[$i];
            $request['retail_rate'] = $rate[$i];

            $request['customer_id'] = $customer_id;

            if ($request->customer_name == null && $request->mobile_no == null && $request->customer_id != null){

                $request['customer_name'] = $customer_name;
                $request['customer_contact_no']  = $customer_mobile_no;
                $request['customer_add']  = $customer_address;
            }


            $all = $request->except('pro_id','qty','rate','mobile_no','phone_no','mail','address');

            $request->validate([
                'pro_id' =>'required',
                'qty' =>'required',
                'rate' =>'required',
//                'customer_name'=>'required',
//                'customer_contact_no'=>'required',
//                'customer_add'=>'required'
            ]);

            Sales_entry::create($all);

            $p_quan = Product::where('id',$products_id[$i])->select('quantity')->first();

            if ($p_quan->quantity == null){

                Product::where('id',$products_id[$i])->update(['status'=>1]);
            }else{
                $total_quantity = $p_quan->quantity - $quantity[$i];
                Product::where('id',$products_id[$i])->update(['quantity'=>$total_quantity]);
            }


        }
        else{
            
        $total_quantity = $p_quan->quantity - $quantity[$i];
        Product::where('id',$products_id[$i])->update(['quantity'=>$total_quantity]);
        }
        
        }
        
        // Product::where('id',$products_id)->delete(['product_id'=>$products_id]);
        return redirect('product_invoice/'.$receipt_no);
        
        
        }

    public function show_sales_form(){

        $products= Product::where('status','0')->orwhere('quantity','>','0')->get();

        $customers =Customer::all();


        return view('sale',compact('products','customers'));
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

        $all  = Sales_entry::all()->unique('receipt_no')->sortByDesc('receipt_no');

        return view('sales_history',compact('all'));

    }

    public function sold(){
        $all = DB::table('sales_entries')
            ->join('product','sales_entries.product_id','=','product.id')
            ->select('sales_entries.product_id','sales_entries.receipt_no','sales_entries.sale_quantity','sales_entries.retail_rate','sales_entries.created_at','product.product_name','product.quantity')->orderBy('sales_entries.id','desc')->get();


        return view('sold_product',compact('all'));

    }

}
