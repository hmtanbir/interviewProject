<?php

namespace App\Http\Resources\Post;

use Illuminate\Http\Resources\Json\ResourceCollection;

class PostCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $posts = [];
        foreach ( $this->resource as $post ) {
            $posts[] = [
                'id' => $post->id,
                'title' => $post->title,
                'image' => $post->image,
                'description' => $post->description,
            ];
        }

        return $posts;
    }
}
