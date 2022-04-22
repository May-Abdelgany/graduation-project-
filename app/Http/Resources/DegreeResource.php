<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class DegreeResource extends JsonResource
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
            "student_id"=>$this->student_id,
            "exam_id"=>$this->exam_id,
            "degree"=>$this->degree
        ];
    }
}
