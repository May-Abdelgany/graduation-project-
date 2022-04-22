<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class McqResource extends JsonResource
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
          "answer1"=>$this->answer1,
          "answer2"=>$this->answer2,
          "answer3"=>$this->answer3,
          //"correct_answer"=>$this->correct_answer,
          //"degree"=>$this->degree,
          //"time"=>$this->time,
          //"status"=>$this->status,
          "display"=>$this->display,
          //"course_id"=>$this->course_id,
          //"exam_id"=>$this->exam_id
        ];
    }
}
