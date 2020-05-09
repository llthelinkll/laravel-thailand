<?php

namespace Baraear\ThaiAddress\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ThaiAddressResource extends JsonResource
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
            'sub_district' => $this->sub_district->name,
            'district' => $this->district->name,
            'province' => $this->province->name,
            'postal_code' => $this->code,
        ];
    }
}
