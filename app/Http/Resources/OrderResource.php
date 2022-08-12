<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
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
            'id' => $this->id,
            'from_address' => $this->from_address,
            'to_address' => $this->from_address,
            'price' => $this->price,
            'phone' => $this->phone,
            'created_at' => Carbon::parse($this->created_at)->format('Y-m-d H:i')
        ];
    }
}
