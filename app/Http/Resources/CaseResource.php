<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CaseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'court_id'=>$this->court_id,
            'case_room'=>$this->case_room,
            'Status'=>$this->Status,
            'Value_Status'=>$this->Value_Status,
            'facts'=>$this->facts,
            'claim'=>$this->claim,

        ];
    }
}
