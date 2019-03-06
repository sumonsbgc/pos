<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function show_sales_form(){


        return view('sale');
    }

}
