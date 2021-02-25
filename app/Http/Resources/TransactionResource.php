<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TransactionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'type' => $this->getType(),
            'cost' => $this->cost,
            'remarks' => $this->remarks,
            'date' => $this->date,
            'image' => $this->originalImage ? $this->image : null,
            'user' => UserResource::make($this->whenLoaded('user')),
        ];
    }
}
