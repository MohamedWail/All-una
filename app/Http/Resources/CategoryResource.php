<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Session;


class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $locale = $request->server('HTTP_ACCEPT_LANGUAGE');
        return [
            'name'=> $locale == 'en' ? $this->name : $this->name_ar,
            'path_of_image'=>URL::to('/').$this->path_of_image,
        ];
    }
}
