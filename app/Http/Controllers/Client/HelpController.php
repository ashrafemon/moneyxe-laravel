<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HelpController extends Controller
{
    // Site Help Page
    public function index(){
        return view('client.help.index');
    }
}
