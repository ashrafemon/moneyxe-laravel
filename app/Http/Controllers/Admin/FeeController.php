<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Fee;

class FeeController extends Controller
{
    public function __construct(){
		$this->middleware('auth');
    }
    
    public function index(){
        $fee = Fee::first();

    	return view('admin.fee.index', compact('fee'));
    }

    public function edit($id){
        $fee = Fee::where('id', $id)->first();

        return view('admin.fee.edit', compact('fee'));
    }

    public function update($id){
        $fee = Fee::where('id', $id)->first();

        $data = request()->validate([
            'amount' => 'required|numeric'
        ]);

        $fee->amount = request('amount');
        $fee->update();

        return redirect()->route('admin.fee.index')->with('message', 'Successfully fee updated to database');
    }
}
