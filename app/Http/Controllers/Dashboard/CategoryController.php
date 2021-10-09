<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Validator;

class CategoryController extends Controller
{
    //List All Category
    public function index() {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    //Create Category
    public function create() {
        return view('category.create');
    }

    //Store Category
    public function store(Request $request) {

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'path_of_image'=>'required',
            'path_of_image.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        if ($validator->fails()) {

            // redirect back to post create page
            // with submitted form data
            return redirect()->route('CategoryCreate')
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('path_of_image')){
            $filename = time() . '.' . $request->path_of_image->getClientOriginalExtension();
            $imageName= '/assets/images/categories/'. $filename;
            request()->file('path_of_image')->move(public_path('assets/images/categories'), $filename);
        }

        $data = $request->all();
        $data['path_of_image']=$imageName;

        Category::create($data);

        return redirect()->route('CategoryHome');
    }

    //Edit Category
    public function edit($id){
        $category = Category::find($id);
        return view('category.edit',compact('category'));
    }

    //Update Category
    public function update(Request $request, $id) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'path_of_image'=>'sometimes',
            'path_of_image.*'=>'image|mimes:jpeg,png,jpg,gif,svg|max:5120'
        ]);

        $data = request()->except(['_token', '_method']);


        if ($validator->fails()) {

            // redirect back to post create page
            // with submitted form data
            return redirect()->route('category.edit')
                ->withErrors($validator)
                ->withInput();
        }

        if($request->hasFile('path_of_image')){

            $filename = time() . '.' . $request->path_of_image->getClientOriginalExtension();
            $imageName= '/assets/images/categories/'. $filename;
            request()->file('path_of_image')->move(public_path('assets/images/categories'), $filename);
            $data['path_of_image']=$imageName;

        }


        Category::where('id',$id)->update($data);

        return redirect()->route('CategoryHome');
    }

    //Delete Category
    public function delete($id) {
        $category = Category::find($id)->delete();
        return redirect()->route('CategoryHome');
    }
}
