<?php 

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'system_name' => $this->system_name,
            'type' => $this->type,
            'connection_port' => $this->connection_port,
            'protocol' => $this->protocol,
            'access_identifier' => $this->access_identifier,
            'api_token' => $this->api_token,
            'status' => $this->status,
            'image_path' => $this->image_path ? asset($this->image_path) : asset('default-api.png'),
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),
        ];
    }
}
