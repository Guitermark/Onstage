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
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'last_name' => $this->last_name,
            'student_number' => $this->student_number,
            'email' => $this->email,
            'ec' => $this->ec,
            'modules' => $this->modules,
            'previous_comakership' => $this->previous_comakership,
        ];
    }
}
