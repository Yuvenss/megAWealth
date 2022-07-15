<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $created_at = Carbon::parse($this->created_at)->format('Y-m-d');
        return [
            'transaction_date' => $created_at,
            'transaction_id' => $this->transaction_id,
            'id' => $this->property_id,
            'type_of_sales' => $this->property_sales_type,
            'building_type' => $this->property_type,
            'price' => $this->property_price,
            'location' => $this->property_address,
            'image_path' => $this->property_image,
        ];
    }
}
