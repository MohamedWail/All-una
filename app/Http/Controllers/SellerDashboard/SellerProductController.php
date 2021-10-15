<?php

namespace App\Http\Controllers\SellerDashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\Image;
use Auth;
use Validator;


class SellerProductController extends Controller
{
    //list of logged in seller
    //add product
    public function create() {
        $categories = Category::all();
        return view('seller_dashboard_product.create', compact('categories'));
    }


    public function store(Request $request) {
        $data = request()->validate([
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'description' => 'required',
            'description_ar' => 'required',
            'category_id' => 'required',
            'start_price' => 'required',
            'duration' => 'required',
        ]);

        request()->validate([
            'product_image' => 'required|nullable',
            'product_image.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $data['user_id'] = Auth::user()->id;


        $product = Product::create($data);

        if($request->hasFile('product_image')){
            $files = $request->file('product_image');
            foreach ($files as $file) {
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $imageName= '/assets/images/products/'. $filename;
                $file->move(public_path('assets/images/products'), $filename);
                
                Image::create([
                    'product_id' => $product->id,
                    'path' => $imageName
                ]);
            }
        }

        return redirect()->route('SellerDashboard');

    }
    //edit product request
    public function edit($id) {
        $product = Product::find($id);

        return view('seller_dashboard.request', compact('product'));

    }
    //To submit the request of edit to the admin on hold products tab
    public function submitRequest(Request $request, $id) {
        $data = request()->validate([
            'request' => 'required|string',
        ]);



        Product::where('id', $request->id)->update($data);

        return redirect()->route('SellerDashboard');
        
    }
    //delete product
    public function delete($id) {
        $product = Product::find($id)->update([
            'request' => 'delete request',
            'on_hold' => 1,
            'status' => 'On Hold - delete'
        ]);
        
        return redirect()->back();
    }
}
