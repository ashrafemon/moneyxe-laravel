<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    // Site About Page
    public function index(){
        return view('client.about.index');
    }
}
