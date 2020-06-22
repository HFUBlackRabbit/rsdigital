<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'qtty', 'price'];

    protected $casts = [
        'name' => 'string',
        'qtty' => 'integer',
        'price' => 'decimal:2'
    ];

    public $timestamps = false;

    /*public function properties() {
        return $this->hasManyThrough(Property::class, ProductProperty::class, 'product_id', 'id', 'id', 'property_id');
    }*/

    public function properties() {
        return $this->belongsToMany(Property::class)
            ->using(ProductProperty::class)
            ->withPivot(['value']);
    }
}
