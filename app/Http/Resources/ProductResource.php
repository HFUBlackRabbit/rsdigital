<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $properties = $this->properties->groupBy('id');
        $properties = $properties->map(function ($property) {
            if ($property->first()->type !== 'array') {
                $value = $property->first()->pivot->value;
                return $property->first()->type === 'integer' ? intval($value) : $value;
            }
            return $property->pluck('pivot.value');
        });
        return [
            'id' => $this->id,
            'name' => $this->name,
            'qtty' => $this->qtty,
            'price' => $this->price,
            'properties' => $properties
        ];
    }
}
