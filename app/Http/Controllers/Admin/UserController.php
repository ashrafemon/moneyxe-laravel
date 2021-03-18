<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;

class UserController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
    }
    
    public function index(){
        $users = User::all();

    	return view('admin.user.index', compact('users'));
    }

    public function destroy($id){
        User::where('id', $id)->delete();

    	return redirect()->route('admin.user.index')->with('message', 'Successfully user deleted from database...');
    }


}
