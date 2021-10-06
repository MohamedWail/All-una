<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{

    //Delete User from Dashboard
    public function delete($id) {

        User::find($id)->delete();
        
        return redirect()->back();
    
    }


    //Approval for User
    public function approved($id) {

        $user = User::where('id', $id)->update(['status' => 'approved']);

        return redirect()->back();

    }

    //Disapproval for User
    public function rejected($id) {

        $user = User::where('id', $id)->update(['status' => 'rejected']);

        return redirect()->back();
    
    }
}
