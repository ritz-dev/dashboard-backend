<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AstrologerActivityLogResource extends JsonResource
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
            "action" => $this->action,
            "log_timestamp" => $this->log_timestamp,
            "details" => $this->details,
        ];
    }
}
