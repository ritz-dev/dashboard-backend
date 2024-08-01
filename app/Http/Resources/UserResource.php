<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'full_name' => $this->full_name,
            'email' => $this->email,
            'password' => $this->password,
            'phone' => $this->phone,
            'img_url' => $this->img_url,
            'birth_datetime' => $this->birth_datetime,
            'birth_place' => $this->birth_place,
            'gender' => $this->gender,
            'cash_amount' => $this->cash_amount,
            'follower' => $this->follower,
            'date_created' => $this->date_created,
        ];
    }
}
