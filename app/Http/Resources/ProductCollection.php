<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    // Los elementos de la colleccion toman el templete de ProductResource
    public $collects = ProductResource::class;  
    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => $this->collection,
            'links' => 'metadata',
            'authors' =>[
                'Tito',
                'PLatzi'
            ],
        ];
    }
}
