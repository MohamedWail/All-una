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
        $products = ProductResource::collection(Product::where('status', 'approved')->get());
        return $this->sendResponse($products, 'Products obtained successfully.', '200');
    }
}
