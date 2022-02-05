<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Str;

class FormResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {

        $data = [
            'id' => $this->id,
            'content' => $this->content,
            'form_name' => $this->form_name,
            'attributes' => $this->attributes,
            'user_id' => $this->user_id,
        ];

//        if need user object add '?include=user' as query string in url.
        if (Str::contains($request->include, 'user')) {
            $data['user'] = $this->user;
        }
        return $data;
    }
}
