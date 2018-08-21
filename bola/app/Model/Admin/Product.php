<?php

namespace App\Model\Admin;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $guarded = [];
    protected $table = "products";

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,'product_category_id','id');
    }
}
