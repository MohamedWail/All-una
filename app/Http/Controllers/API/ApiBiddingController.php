<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Controllers\API\BaseController as BaseController;
use Illuminate\Http\Request;
use Google\Cloud\Firestore\FirestoreClient;
use App\Models\Product;
use App\Models\Bidding;
use App\Models\User;
use Validator;
use Auth;


class ApiBiddingController extends BaseController
{
    public function test() {
        $db = new FirestoreClient([
            'projectId' => 'alla-una'
        ]);

        // create Data
        // $products = $db->collection('biddings');
        // $products->newDocument()->set([
        //     'categoryId' => '1',
        //     'endDuration' => '2014-06-26 04:07:31',
        //     'id' => '2',
        //     'lastBid' => 652.33,
        //     'ownerName' => 'Samir Gamel',
        //     'productName' => 'Mobile',
        //     'startPrice' => 255.25,
        //     'state' => 'All\'una',
        //     'userId' => '2'
        // ]);

        $data = [
            'categoryId' => '1',
            'endDuration' => '2014-06-26 04:07:31',
            'id' => '2',
            'lastBid' => 652.33,
            'ownerName' => 'Samir Gamel',
            'productName' => 'Mobile',
            'startPrice' => 255.25,
            'state' => 'All\'una',
            'userId' => '2'
        ];

         //Add Data
        $db->collection('bidding')->document('NEWPRODUCT')->set($data);
    }

    //create bid and list of users
    
    public function bid(Request $request) {

        $user = User::find($request['user_id']);
        $product = Product::find($request['product_id']);

        $db = new FirestoreClient([
            'projectId' => 'alla-una'
        ]);

        $datafirebase = [
            'product_id' => $request['product_id'],
            'user_id' => $request['user_id'],
            'bid' => $request['bid']
        ];

        $userdata = [
            'username' => $user->username,
            'email' => $user->email,
            'bid' => $request['bid']
        ];

        $db->collection('bidding')->document($request['product_id'])->collection('users')->document($request['user_id'])->set($userdata);

        $db->collection('bidding')->document($request['product_id'])->set($datafirebase);

        $validator = Validator::make($request->all(), [
            'bid' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendError('Validation Error.', $validator->errors());       
        }
        
        

        Bidding::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
            'bid' => $request->bid
        ]);

        

    }
}
