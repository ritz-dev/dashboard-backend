<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class AstrologerResource extends JsonResource
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
            'full_name' => $this->full_name,
            'email' => $this->email,
            'password' => $this->password,
            'phone' => $this->phone,
            'img_url' => $this->img_url,
            'experience_years' => $this->experience_years,
            'specialization' => $this->specialization,
            'bio' => $this->bio,
            'gender' => $this->gender,
            'cash_amount' => $this->cash_amount,
            'date_created' => $this->date_created,
        ];
    }
}
