<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AdministratorActivityLogResource extends JsonResource
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
            "administrator_id" => $this->administrator_id,
            "action" => $this->action,
            "log_timestamp" => $this->log_timestamp,
            "details" => $this->details,
        ];
    }
}
