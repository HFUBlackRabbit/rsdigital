<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ProductProperty extends Pivot
{
    protected $fillable = ['product_id', 'property_id', 'value'];

    protected $casts = [
        'product_id' => 'integer',
        'property_id' => 'integer',
        'value' => 'string'
    ];

    //protected $hidden = ['property_id', 'product_id'];

    public $timestamps = false;

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function property() {
        return $this->belongsTo(Property::class);
    }
}
