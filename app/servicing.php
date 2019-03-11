<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class servicing extends Model
{
 
    protected $fillable=['customer_name','product_name','service_charge','address','mobile','paid','due'];
}
