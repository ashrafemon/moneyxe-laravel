<?php

namespace App\Http\Controllers\Client\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Auth;
use App\Model\UserInfo;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    // Checking Authentication
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('client.backend.profile.index');
    }

    public function updatePersonalInfo(){
    	$user = Auth::user()->userinfo;

    	$user->first_name = request('first_name');
    	$user->last_name = request('last_name');
    	$user->dob = request('dob');
    	$user->address = request('address');
    	$user->city = request('city');
    	$user->state = request('state');
    	$user->zip_code = request('zip_code');
    	$user->country = request('country');
    	$user->update();

    	return redirect()->route('client.profile.index')->with('message', 'Successfully updated user information to database...');
    }

    public function updateAccount(){
    	$user = Auth::user()->userinfo;

    	$user->language = request('language');
    	$user->update();

    	return redirect()->route('client.profile.index')->with('message', 'Successfully updated user information to database...');
    } 

    public function updatePhone(){
    	$user = Auth::user()->userinfo;

    	$user->phone = request('phone');
    	$user->update();

    	return redirect()->route('client.profile.index')->with('message', 'Successfully updated user information to database...');
    } 

    public function updatePassword(){
		$user = Auth::user();

    	$data = request()->validate([
    		'password' => 'required|string|min:8|confirmed'
    	]);

    	if(Hash::check(request('current_password'), $user->password)){
    		$user->password = Hash::make(request('password'));
    		$user->update();

    		Auth::logout();

    		return redirect()->route('login');
    	}else{
    		return redirect()->route('client.profile.index')->with('message', 'Password not matched...');
    	}
    }
}
