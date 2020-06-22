<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Product;
use App\ProductProperty;
use App\Property;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $properties = $request->properties;
        if (empty($properties)) {
            $products = Product::with('properties')->paginate(40);
            return ProductResource::collection($products);
        }

        $props = Property::with('value')->whereHas('value', function ($query) use ($properties) {
            foreach ($properties as $key => $property) {
                $query->where('property_id', $key);
                $query->whereIn('value', $property);
            }
        })->whereIn('id', array_keys($properties))->get();

        $props = ProductProperty::with('product');
        foreach ($properties as $propId => $value) {
            $props->where('property_id', $propId);
            $props->whereIn('value', $value);
        }
        $props->get();
        $productIds = $props->pluck('product_id')->unique()->toArray();

        $products = Product::with('properties')->whereIn('id', $productIds)->paginate(40);
        return ProductResource::collection($products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
