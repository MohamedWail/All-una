<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Models\Category;


class ApiCategoryController extends BaseController
{
    //List All Categories 
    public function index() {
        $categories = CategoryResource::collection(Category::get());
        return $this->sendResponse($categories, 'Categories obtained successfully.', '200');
    }
}
