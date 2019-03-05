<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $table='brands';
    protected $fillable=['category_id','brand_name'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}

