<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\PaymentMethod;

class PaymentMethodController extends Controller
{
	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
    	$methods = PaymentMethod::all();

    	return view('admin.payment.index', compact('methods'));
    }

    public function create(){
    	return view('admin.payment.create');
    }

    public function store(){
    	$data = request()->validate([
			'title' => 'required|string',
			'method_id' => 'required|string'
    	]);

    	$method = new PaymentMethod();
    	$method->title = strtoupper(request('title'));
    	$method->code = strtolower(request('title'));
    	$method->method_id = strtolower(request('method_id'));
    	$method->save();

    	return redirect()->route('admin.payment.method.index')->with('message', 'Successfully method added to databse...');
	}
	
	public function edit($id){
		$method = PaymentMethod::where('id', $id)->first();
		return view('admin.payment.edit', compact('method'));
	}

	public function update($id){
		$data = request()->validate([
			'title' => 'required|string',
			'method_id' => 'required|string'
    	]);

		$method = PaymentMethod::where('id', $id)->first();

		$method->title = strtoupper(request('title'));
		$method->code = strtolower(request('title'));
		$method->method_id = strtolower(request('method_id'));
		$method->status = request('status');
		$method->update();
		
		return redirect()->route('admin.payment.method.index')->with('message', 'Successfully method updated to databse...');
	}

	public function destroy($id){
		PaymentMethod::where('id', $id)->delete();

		return redirect()->route('admin.payment.method.index')->with('message', 'Successfully method deleted from databse...');
	}
}
