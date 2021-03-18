<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReceiveController extends Controller
{
    // Site Receive Page
    public function index(){
        return view('client.receive.index');
    }
}
