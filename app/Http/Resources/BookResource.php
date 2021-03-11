<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
           'id' => $this->id,
           'title' => $this->title,
           'cover' => $this->cover,
           'price' => $this->price,
           'description' => $this->when($request->book, $this->description),
           'authors' => $this->authors->implode('name', ','),
           'genres' => $this->genres->implode('name', ','),

       ];
        // return parent::toArray($request);
    }
}
