<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Exchange;

class ExchangeController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        $pending_exchanges = Exchange::where('status', 'pending')->get();
        $completed_exchanges = Exchange::where('status', 'complete')->get();

        return view('admin.exchange.index', compact('pending_exchanges', 'completed_exchanges'));
    }

    public function complete($id){
        $exchange = Exchange::where('id', $id)->first();

        $exchange->status = 'complete';
        $exchange->client_status = 'complete';
        $exchange->admin_status = 'complete';

        $exchange->update();

        return redirect()->route('admin.exchange.index')->with('message', 'Successfully exchange complete...');
    }

    public function destroy($id){
        Exchange::where('id', $id)->delete();

        return redirect()->route('admin.exchange.index')->with('message', 'Successfully exchange deleted from databse...');
    }
}
