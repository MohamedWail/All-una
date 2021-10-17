<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\ImageResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $locale = $request->server('HTTP_ACCEPT_LANGUAGE') ;

        return [
            'name' => $locale == 'en' ? $this->name : $this->name_ar,
            'category' => $locale == 'en' ? $this->category->name : $this->category->name_ar,
            'description' => $locale == 'en' ? $this->description : $this->description_ar,
            'start_price' => $this->start_price,
            'duration' => $this->duration,
            'images' => ImageResource::collection($this->images)
        ];
    }
}
