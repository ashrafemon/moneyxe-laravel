<?php

namespace App\Http\Controllers\Client\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Exchange;
use Auth;

class DashboardController extends Controller
{
    // Checking Authentication
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $exchanges = Exchange::where('user_id', Auth::user()->id)->orderBy('updated_at', 'desc')->limit(5)->get();

        return view('client.backend.dashboard.index', compact('exchanges'));
    }
}
