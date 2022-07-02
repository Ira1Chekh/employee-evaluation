<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RatingResource extends JsonResource
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
            'correctness' => $this->correctness,
            'initiative' => $this->initiative,
            'comment' => $this->comment,
            'project_user' => ProjectUserResource::make($this->whenLoaded('projectUser')),
//            'project_name' => $this->projectUser->project->name,
        ];
    }
}
