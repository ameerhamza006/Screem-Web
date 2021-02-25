<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => sprintf('%s %s', $this->f_name, $this->l_name),
            'first_name' => $this->f_name,
            'last_name' => $this->l_name,
            'email' => $this->email,
            'phone' => $this->phone_no,
            'address' => $this->address,
            'image' => $this->originalImage ? $this->image : null,
        ];
    }
}
