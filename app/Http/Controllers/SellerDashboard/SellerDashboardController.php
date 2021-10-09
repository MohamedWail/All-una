<?php

namespace App\Http\Controllers\SellerDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class SellerDashboardController extends Controller
{
    public function index() {
        $products = Product::all();
        return view('seller_dashboard.index', compact('products'));
    }
}
