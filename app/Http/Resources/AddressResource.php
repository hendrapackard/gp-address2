<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AddressResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'note' => $this->note,
            'village' => $this->village,
            'sub_district' => $this->subDistrict,
            'city' => $this->city,
            'province' => $this->province,
            'country' => $this->country,
            'is_default' => $this->is_default,
            'postcode' => $this->postcode,
            'owner_id' => $this->owner_id,
        ];
    }

    public function with($request)
    {
        return [
            'code' => 200,
            'message' => 'success',
        ];
    }
}
