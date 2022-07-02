<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectUserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => UserResource::make($this->whenLoaded('user')),
            'rating' => RatingResource::make($this->whenLoaded('rating')),
            'project' => ProjectResource::make($this->whenLoaded('project')),
        ];
    }
}
