<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Auth;

class ProductController extends Controller
{
    //list of all products with seller name 
    public function index() {
        $products = Product::where('on_hold', 0)->get();
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

    public function onhold() {
        $products = Product::where('on_hold', 1)->get();

        return view('products.on_hold_products', compact('products'));
    }

    public function edit($id) {
        $product = Product::find($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id) {
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
            'product_image' => 'sometimes|nullable',
            'product_image.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5120',
        ]);

        $data['user_id'] = Auth::user()->id;
        $data['status'] = 'pending';
        $data['on_hold'] = 0;


        $product = Product::where('id', $id)->update($data);

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

        return redirect()->route('dashboard');

    }

    public function delete($id) {
        Product::find($id)->delete();

        return redirect()->route('ProductHome');
    }
}
