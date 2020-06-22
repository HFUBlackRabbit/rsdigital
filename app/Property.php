<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = ['name', 'type'];

    protected $casts = [
        'name' => 'string',
        'type' => 'string'
    ];

    public $timestamps = false;

    public function product() {
        return $this->hasManyThrough(ProductProperty::class, Product::class);
    }

    public function value() {
        return $this->hasMany(ProductProperty::class);
    }
}
