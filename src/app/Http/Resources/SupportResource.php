<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class SupportRequestResource extends JsonResource
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
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'subject' => $this->subject,
            'email' => $this->email,
            'message' => $this->message,
            'deleted_at' => $this->deleted_at ? $this->deleted_at->toDateTimeString() : null,  
        ];
    }
}
