<?php

namespace App\Http\Controllers\Client\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Exchange;
use Auth;

class TransactionController extends Controller
{
    // Checking Authentication
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $exchanges = Exchange::where('user_id', Auth::user()->id)->paginate(5);

        return view('client.backend.transaction.index', compact('exchanges'));
    }
}
