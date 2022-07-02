<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
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
            'name' => $this->name,
            'start_date' => $this->start_date,
            'importance' => $this->importance,
            'status' => $this->status,
            'project_users' => ProjectUserResource::collection($this->whenLoaded('projectUsers')),
            'users' => UserResource::collection($this->whenLoaded('users')),
            'ratings' => RatingResource::collection($this->whenLoaded('ratings'))
        ];
    }
}
