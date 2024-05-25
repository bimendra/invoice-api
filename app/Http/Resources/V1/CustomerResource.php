<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\V1\InvoiceResource;

class CustomerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'        =>          $this->id,
            'type'      =>          $this->type,
            'name'      =>          $this->name,
            'email'     =>          $this->email,
            'address'   =>          $this->address,
            'city'      =>          $this->city,
            'state'     =>          $this->state,
            'postCode'  =>          $this->post_code,
            'invoices' =>          InvoiceResource::collection($this->whenLoaded('invoices')),
        ];
    }
}
