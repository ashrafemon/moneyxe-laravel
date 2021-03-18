<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Exchange;
use App\User;

use Carbon\Carbon;


class DashboardController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
    }
    
    public function index(){
      $exchanges = Exchange::latest()->limit(5)->get();

      $today_users = User::whereDate('created_at', Carbon::today())->get();
      $today_exchanges = Exchange::whereDate('created_at', Carbon::today())->get();

    	return view('admin.dashboard.index', compact('exchanges', 'today_users', 'today_exchanges'));
    }
}
