<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FeesController extends Controller
{
    // Site Fees Page
    public function index(){
        return view('client.fees.index');
    }
}
