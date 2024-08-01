<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AstrologerToolResource extends JsonResource
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
            "astrologer_id" => $this->astrologer_id,
            "astrological_tool_id" => $this->astrological_tool_id,
            "charge" => $this->charge,
        ];
    }
}
