<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param ProductRequest $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(ProductRequest $request)
    {
        $properties = $request->properties;
        if (empty($properties)) {
            $products = Product::with('properties')->paginate(40);
            return ProductResource::collection($products);
        }
        $properties = array_filter($properties,
            function ($property) {
                return is_array($property) && !empty($property);
            });

        $products = Product::with('properties');

        foreach ($properties as $key => $property) {
            $products->whereHas('properties', function ($query) use ($key, $property) {
                $query->where('property_id', $key);
                if (is_array($property)) {
                    $query->whereIn('value', $property);
                } else {
                    $query->where('value', $property);
                }
            });
        }
        $products = $products->paginate(40);
        return ProductResource::collection($products);
    }
}
