<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';

    protected $guarded=[];

    public function categories()
    {
        return $this->belongsTo('App\Catergory');
    }

    public function brands()
    {
        return $this->hasOne('App\Brand');
    }

    public function supplier()
    {
        return $this->hasOne('App\Supplier');
    }
}
