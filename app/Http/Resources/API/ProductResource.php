<?php

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
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
            'id' => $this->id ,
            'name' => $this->name ?? '',
            'gender' => $this->gender ?? '',
            'image' => $this->image ?? '',
            'views' => $this->views ?? '',
            'currency' => $this->currency ?? '',
            'price' => $this->price ?? '',
            'sale' => $this->sale ?? '',
            'rating' => $this->rating ?? '',
            'href' => $this->href ?? '',
            'brand_name' => $this->brand->name ?? '',
            'manufacturer_id' => $this->brand->manufacturer_id ?? '',
        ];
    }

    // protected function paginationLinks($paginated)
    // {
    //     return [
    //         'prev' => $paginated['prev_page_url'] ?? null,
    //         'next' => $paginated['next_page_url'] ?? null,
    //     ];
    // }

    // protected function meta($paginated)
    // {
    //     $metaData = parent::meta($paginated);
    //     return [
    //         'current_page' => $metaData['current_page'] ?? null,
    //         'total_items' => $metaData['total'] ?? null,
    //         'per_page' => $metaData['per_page'] ?? null,
    //         'total_pages' => $metaData['total'] ?? null,
    //     ];
    // }
}
