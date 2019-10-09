<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class RecipeCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    public function with($request)
    {
        return [
            'meta' => [
                'currentPage' => $this->currentPage(),
                'totalItems' => $this->total(),
                'itemsPerPage' => $this->perPage(),
                'totalPages' => $this->lastPage(),
            ],
            'links' => [
                //prev and next were duplicates
                //'prev' => $this->previousPageUrl(),     
                //'next' => $this->nextPageUrl(),
                'self' => $this->url($this->currentPage()),
            ],
        ];
    }

}
