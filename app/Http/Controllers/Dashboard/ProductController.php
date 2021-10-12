<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //list of all products with seller name 
    public function index() {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    //approve product
    public function approved($id) {
        Product::where('id', $id)->update(['status' => 'approved']);

        return redirect()->back();
    }


    //reject product
    public function rejected($id) {
        $product = Product::where('id', $id)->update(['status' => 'rejected']);

        return redirect()->back();
    }
}
