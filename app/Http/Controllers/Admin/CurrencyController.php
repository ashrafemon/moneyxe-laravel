<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Currency;

class CurrencyController extends Controller
{

	public function __construct(){
		$this->middleware('auth');
	}

    public function index(){
    	$currencies = Currency::all();

    	return view('admin.currency.index', compact('currencies'));
    }

    public function create(){
    	return view('admin.currency.create');
    }

    public function store(){
    	$data = request()->validate([
    		'title' => 'required|string',
    		'code' => 'required|max:3|min:3',
			'value' => 'required',
			'symbol' => 'required|min:1|max:1'
    	]);

    	$currency = new Currency();
    	$currency->title = request('title');
    	$currency->code = strtoupper(request('code'));
    	$currency->avatar = 'currency-flag-'.strtolower(request('code'));
    	$currency->value = request('value');
    	$currency->symbol = request('symbol');
    	$currency->save();

    	return redirect()->route('admin.currency.index')->with('message', 'Successfully currency added to databse...');
	}
	
	public function edit($id){
		$currency = Currency::where('id', $id)->first();
		return view('admin.currency.edit', compact('currency'));
	}

	public function update($id){
		$data = request()->validate([
    		'title' => 'required|string',
    		'code' => 'required|max:3|min:3',
			'value' => 'required',
			'symbol' => 'required|min:1|max:1'
    	]);

		$currency = Currency::where('id', $id)->first();

		$currency->title = request('title');
    	$currency->code = strtoupper(request('code'));
    	$currency->avatar = 'currency-flag-'.strtolower(request('code'));
		$currency->value = request('value');
		$currency->symbol = request('symbol');
		$currency->status = request('status');
		$currency->update();
		
		return redirect()->route('admin.currency.index')->with('message', 'Successfully currency updated to databse...');
	}

	public function destroy($id){
		Currency::where('id', $id)->delete();

		return redirect()->route('admin.currency.index')->with('message', 'Successfully currency deleted from databse...');
	}
}
