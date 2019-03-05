<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table='suppliers';

    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
