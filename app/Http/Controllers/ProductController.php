<?php

namespace App\Http\Controllers;

use App\Http\Requests\BrandRequest;
use App\Http\Requests\ProductBrandManufacturerIdRequest;
use App\Http\Requests\ProductFilterRequest;
use App\Http\Requests\ProductGenderRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\API\ProductCollection;
use App\Services\ProductService;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    /**
     * Base URL public in this controller.
     * {
     * parent::__construct($productService);
     * }
     *public function __construct(ProductService $productService)
     * @return void
     */
    protected $baseUri;

    public function __construct(ProductService $productService)
    {
        $this->baseUri = "https://staging.dumyah.com/coding-test/";

        $this->productService = $productService;
    }
    /**
     * Get All the details of a products.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProducts(Request $request)
    {
        $page = $request->_page ?: null;

        $limit = $request->_limit == null ?  $request->_limit == 10 : $request->_limit;

        $name = $request->name_like;

        $data = $this->productService->getProducts($limit, $page);

        $brands = $this->productService->getBrands($name);

        $products = new ProductCollection($data);

        $pro = $products->count();

        return view('products', compact('products', 'brands', 'pro'));
    }

    /**
     * filter Price  of a product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductFilter(ProductFilterRequest $request)
    {
        $price_lte = $request->price_lte ?: null;

        $price_gte = $request->price_gte ?: null;

        $name = $request->name_like;

        $data = $this->productService->getProductFilter($price_gte, $price_lte);

        $brands = $this->productService->getBrands($name);

        $products = new ProductCollection($data);

        return view('products', compact('products', 'brands'));
    }
    /**
     * filter Sort  of a product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductSort(Request $request)
    {
        $_sort = $request->_sort ?: null;

        $_order = $request->_order ?: null;

        $name = $request->name_like;

        $data = $this->productService->getProductSort($_order, $_sort);

        $brands = $this->productService->getBrands($name);

        $products = new ProductCollection($data);

        return view('products', compact('products', 'brands'));
    }

    /**
     * filter Sale  of a product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductSale(Request $request)
    {
        $sale_ne = 'false';

        $name = $request->name_like;

        $data = $this->productService->getProductSale($sale_ne);

        $brands = $this->productService->getBrands($name);

        $products = new ProductCollection($data);

        return view('products', compact('products', 'brands'));
    }

    /**
     * Shearch Brands of a product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getBrands(BrandRequest $request)
    {
        $name = $request->name_like ;

        $brands = $this->productService->getBrands($name);

        $data = $this->productService->getProduct();

        $products = new ProductCollection($data);

        return view('products', compact('products', 'brands'));
    }
    /**
     * Shearch Gender of a product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductGender(ProductGenderRequest $request)
    {
        $gender = $request->gender ?: null;

        $name = $request->name_like;

        $brands = $this->productService->getBrands($name);

        $data = $this->productService->getProductGender($gender);

        $products = new ProductCollection($data);

        return view('products', compact('products', 'brands'));
    }
    /**
     * Shearch brand manufacturer id  of a product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getProductBrandManufacturer(ProductBrandManufacturerIdRequest $request)
    {
        $name = $request->name_like;

        $brandManufacturer_id = $request->brandManufacturer_id ?: null;

        $brands = $this->productService->getBrands($name);

        $data = $this->productService->getProductBrandManufacturerId($brandManufacturer_id);

        $products = new ProductCollection($data);

        return view('products', compact('products', 'brands'));
    }
    /**
     * All Filtters of a product.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function getAnyProducts(Request $request)
    {
        $name = $request->name_like;
        $sale_ne = $request->sale_ne ? 'false' :null;
        $gender = $request->gender ?: null;
        $brandManufacturer_id = $request->brandManufacturer_id ?: null;
        $page = $request->_page == null ? $request->_page == 10 : $request->_page;
        $_sort = $request->_sort ?: null;
        $_order = $request->_order ?: null;
        $limit = $request->_limit ?: null;
        $price_lte = $request->price_lte ?: null;
        $price_gte = $request->price_gte ?: null;

        $brands = $this->productService->getBrands($name);

        $data = $this->productService->Products($brandManufacturer_id, $gender, $sale_ne, $_sort, $_order, $price_gte, $price_lte, $page, $limit);

        $products = new ProductCollection($data);

        return view('products', compact('products', 'brands'));
    }
}
