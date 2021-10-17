<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ApiProductController extends BaseController
{
    public function products() {
        $products = ProductResource::collection(
            Product::where([['status', 'approved'], ['on_hold', 0]])->get()
        );
        if(!$products->isEmpty()) {
            return $this->sendResponse($products, 'Products obtained successfully.', '200');
        } else {
            return $this->sendResponse($products, 'No Products Available.', '200');
        }
        
    }

    public function getSingleProduct($id) {
        $product = ProductResource::collection(
            Product::where('id', $id)->get()
        );

        return $this->sendResponse($product, 'Product obtained successfully.', '200');

    }
}