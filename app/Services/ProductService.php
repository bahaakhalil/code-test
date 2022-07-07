<?php

namespace App\Services;

use App\Traits\InteractWithProductResponses;
// use Illuminate\Pagination\LengthAwarePaginator;
// use Illuminate\Support\Collection;
// use Illuminate\Support\Facades\Validator;

class ProductService
{
    use InteractWithProductResponses;

    /**
     * The URL to send the requests
     * @var string
     */
    protected $baseUri;

    public function __construct()
    {
        $this->baseUri = "https://staging.dumyah.com/coding-test/";
    }

    /**
     * All the list of products from the API
     * @return stdClass
     */
    public function getProduct()
    {
        return $this->makeRequest('GET', 'products');
    }
    
    /**
     * Pagination the list of products from the API
     * @return stdClass
     */
    public function getProducts($page, $limit)
    {
        return $this->makeRequest('GET', 'products',  ['_page' => $page, '_limit' => $limit]);
    }

    /**
     * Obtains the list of products from the API
     * @return stdClass
     */
    public function getBrands($name)
    {
        return $this->makeRequest('GET', 'brands', ['name_like' => $name]);
    }

    /**
     * Filte Price the a products from the API
     * @return stdClass
     */
    public function getProductFilter($price_gte, $price_lte)
    {
        return $this->makeRequest('GET', 'products', ['price_gte' => $price_gte, 'price_lte' => $price_lte]);
    }


    /**
     *Filter  Sort  the a products from the API
     * @return stdClass
     */
    public function getProductSort($_sort, $_order)
    {
        return $this->makeRequest('GET', 'products', ['_sort' => $_sort, '_order' => $_order]);
    }

    /**
     *Filter  Sort  the a products from the API
     * @return stdClass
     */
    public function getProductSale($sale_ne)
    {
        return $this->makeRequest('GET', 'products', ['sale_ne' => $sale_ne]);
    }

    /**
     * Filter Gender the a products from the API
     * @return stdClass
     */
    public function getProductGender($gender)
    {
        return $this->makeRequest('GET', 'products', ['gender' => $gender]);
    }

    /**
     * Filter brand manufacturer_id the a products from the API
     * @return stdClass
     */
    public function getProductBrandManufacturerId($brandManufacturer_id)
    {
        return $this->makeRequest('GET', 'products', ['brand.manufacturer_id' => $brandManufacturer_id]);
    }

    /**
     * All Fillters  the a products from the API
     * @return stdClass
     */
    public function Products($brandManufacturer_id, $gender, $_sort, $sale_ne, $_order, $price_gte, $price_lte, $page, $limit)
    {
        return  $this->makeRequest('GET', 'products', [
            'brand.manufacturer_id' => $brandManufacturer_id,
            'price_gte' => $price_gte,
            'price_lte' => $price_lte,
            '_page' => $page,
            '_limit' => $limit,
            '_sort' => $_sort,
            '_order' => $_order,
            'gender' => $gender,
            'sale_ne' => $sale_ne,
        ]);
    }
}
