<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'path_logo' => $this->path_logo ? asset('storage/' . $this->path_logo) : asset('storage/companies/img/recession.png'),
            'business_name'=> $this->business_name,
            'address'=> $this->address,
            'postal_code'=> $this->postal_code,
            'city_name' => $this->city && $this->city ? $this->city->name : null,
        ];
    }
}
