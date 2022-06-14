<?php

namespace Users\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'Id' => $this->id,
            'Product Name' => $this->name,
            'Description' => $this->description,
            'Caregory Name' => $this->category->name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];   
     }
}
