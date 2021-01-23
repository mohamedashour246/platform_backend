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
        return [
            'id' => $this->id,
            'name_ar' => $this->name_ar,
            'name_en' => $this->name_en,
            'description_ar' => $this->description_ar,
            'description_en' => $this->description_en,
            'sub_category_id' => $this->sub_category_id,
            'order' => $this->order,
            'status' => $this->status,
            'type' => $this->type,
            'deliver_services' => $this->deliver_services,
            'unit_type' => $this->unit_type,
            'price' => $this->price,
            'discount' => $this->discount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}
