<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table='categories';
    protected $fillable=['category_name','parent_status'];

    public function parent(){
        return $this->belongsTo(Category::class, 'parent_status');
    }

    public function products()
    {
        return $this->belongsTo('App\Product');
    }
}
