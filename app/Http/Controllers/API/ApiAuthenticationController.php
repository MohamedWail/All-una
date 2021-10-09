<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Auth;


class ApiAuthenticationController extends BaseController
{
    /**
     * Register API as Buyer
     *
     * @return \Illuminate\Http\Response
     */

    public function registerBuyer(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'date_of_birth' => 'date|required',
            'firebase_token' => 'required',
            'path_of_id'=>'required|nullable',
            'path_of_id.*'=>'image|mimes:jpeg,jpg,svg|max:5120',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        if($request->hasFile('path_of_id')){
            $filename = time() . '.' . $request->path_of_id->getClientOriginalExtension();
            $imageName= '/assets/images/IdentificationCards/'. $filename;
            request()->file('path_of_id')->move(public_path('assets/images/IdentificationCards'), $filename);
        }


        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['path_of_id'] = $imageName;
        $data['role'] = 'buyer';


        $user = User::create($data);

        return $this->sendResponse('', 'Buyer Successfully Registered.','200');
        

    }

    /**
     * Register API as Seller
     *
     * @return \Illuminate\Http\Response
     */

    public function registerSeller(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'date_of_birth' => 'date|required',
            'firebase_token' => 'required',
            'path_of_id'=>'required|nullable',
            'path_of_id.*'=>'image|mimes:jpeg,jpg,svg|max:5120',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        if($request->hasFile('path_of_id')){
            $filename = time() . '.' . $request->path_of_id->getClientOriginalExtension();
            $imageName= '/assets/images/IdentificationCards/'. $filename;
            request()->file('path_of_id')->move(public_path('assets/images/IdentificationCards'), $filename);
        }


        $data = $request->all();
        $data['password'] = bcrypt($data['password']);
        $data['path_of_id'] = $imageName;
        $data['role'] = 'seller';

        $user = User::create($data);

        return $this->sendResponse('', 'Seller Successfully Registered.','200');
        
    }  

    /**
     * Login API
     *
     * @return \Illuminate\Http\Response
     */

    public function login(Request $request)
    {

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status' => 'approved']) ) {
            
            $user = Auth::user();

            $user->update(['firebase_token' => $request['firebase_token']]);

            return $this->sendResponse('', 'User Logged in Successfully.', '200');

        } else{ 

            return $this->sendError('Email or Password is incorrect', '400');
        
        } 
    }

}
