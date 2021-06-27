<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ProductService;
use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\ProductStepThreeRequest;
use App\Http\Requests\ProductStepTwoRequest;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService) {
        $this->productService = $productService;
    }

    public function store(CreateProductRequest $request)
    {
        $data = $this->productService->store($request);
        return response()->json($data);
    }

    public function step_two(ProductStepTwoRequest $request)
    {
        $data = $this->productService->step_two($request->all());
        return response()->json($data);
    }

    public function step_three(ProductStepThreeRequest $request)
    {
        $data = $this->productService->step_three($request->all());
        return response()->json($data);
    }

    public function getProductData()
    {
        $data = $this->productService->getData();
        return response()->json($data);
    }

    public function getUserProduct(Request $request)
    {
        $data = $this->productService->userProduct($request->user()->id);
        return response()->json($data);
    }

    public function getUserProductDrafted(Request $request)
    {
        $data = $this->productService->userDraftedProduct($request->user()->id);
        return response()->json($data);
    }


    public function getProduct(Request $request, $id)
    {
        $data = $this->productService->getProduct($request->user()->id,$id);
        return response()->json($data);
    }


    public function getProductShipping(Request $request, $product_id)
    {
        $data = $this->productService->getProductShipping($request->user()->id, $product_id);
        return response()->json($data);
    }

    public function randomProducts()
    {
        $data = $this->productService->randomProducts();
        return response()->json($data);
    }

    public function checkUserProduct(Request $request, $id)
    {
        $data = $this->productService->checkUserProduct($request->user()->id, $id);
        return response()->json($data);
    }

    public function changeStatus(Request $request, $id)
    {
        $data = $this->productService->changeStatus($request->user()->id, $id);
        return response()->json($data);
    }

    public function AddToWishlist(Request $request, $product_id)
    {
        $response = $this->productService->AddToWishlist($request->user()->id,$product_id);
        return response()->json($response);
    }

    // public function getUserProductActive(Request $request)
    // {
        
    // }
}