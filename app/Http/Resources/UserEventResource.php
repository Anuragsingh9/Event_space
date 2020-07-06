<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserEventResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // dd("ok");
        // dd($this);

        return [
            // dd($this),
            'id'=> $this->id,
            'event_id'=>$this->event_id,
            'user_id'=>$this->user_id,
            'is_presenter'=>$this->is_presenter,
            'is_moderator'=>$this->is_moderator,
            'state' => $this->state,
        ];
    }
}
