<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'full_name' => $this->full_name,
            'role' => $this->role,
            'start_date' => $this->start_date,
            'email' => $this->email,
            'ratings_avg_initiative' => $this->ratings_avg_initiative ?? 0,
            'ratings_avg_correctness' => $this->ratings_avg_correctness ?? 0,
            'ratings' => RatingResource::collection($this->whenLoaded('ratings')),
        ];
    }
}
