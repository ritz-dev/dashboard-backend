<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AstrologicalToolResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        // return parent::toArray($request);

        return [
            "tool_name" => $this->tool_name,
            "description" => $this->description,
            "price" => $this->price,
            "developer_id" => $this->developer_id
        ];
    }
}
