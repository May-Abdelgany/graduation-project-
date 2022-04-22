<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CompleteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return[
            "question"=>$this->question,
            "answer"=>$this->answer,
            "degree"=>$this->degree,
            "time"=>$this->time,
            "status"=>$this->status,
            "course_id"=>$this->course_id,
            "exam_id"=>$this->exam_id
          ];
    }
}
