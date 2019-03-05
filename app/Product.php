<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='product';

    protected $guarded=[];

    public function category()
    {
        return $this->hasOne('App\Catergory');
    }

    public function brand()
    {
        return $this->hasOne('App\Brand');
    }
}
