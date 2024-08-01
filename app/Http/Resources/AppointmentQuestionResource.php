<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentQuestionResource extends JsonResource
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
            "user_id" => $this->user_id,
            "astrologer_id" => $this->astrologer_id,
            "request_type" => $this->request_type,
            "request_message" => $this->request_message,
            "request_datetime" => $this->request_datetime,
            "status" => $this->status,
        ];
    }
}
