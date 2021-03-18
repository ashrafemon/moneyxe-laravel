<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Model\Currency;
use App\Model\PaymentMethod;
use App\Model\Exchange;
use App\Model\Fee;
use Auth;

use App\User;
use App\Model\UserInfo;

use Illuminate\Support\Facades\Hash;

class SendController extends Controller
{
    // Site Send Page
    public function index(){

        $currencies = Currency::where('status', 1)->get();
        $methods = PaymentMethod::where('status', 1)->get();

        return view('client.send.index', compact('currencies', 'methods'));
    }

    public function create(){
        $currencies = Currency::where('status', 1)->get();
        $methods = PaymentMethod::where('status', 1)->get();
        $fee = Fee::first();

        return view('client.send.send', compact('currencies', 'methods', 'fee'));
    }

    public function store() {
        $data = request()->validate([
            'send_currency' => 'required',
            'received_currency' => 'required',
            'send_amount' => 'required',
            'received_amount' => 'required',
            'send_method' => 'required',
            'received_method' => 'required',
            'send_method_id' => 'required',
            'received_method_id' => 'required',
            'admin_received_id' => 'required',
            'fee' => 'required',
            'review' => 'required'
        ]);

        $user = User::where('email', request('email'))->first();

        if(!$user){
            $username = explode('@', request('email'));

            $newUser = User::create([
                'name' => $username[0],
                'email' => request('email'),
                'password' => Hash::make('123456789'),
            ]);

            if($newUser){
                UserInfo::create([
                    'user_id' => $newUser->id
                ]);

                $user = User::where('email', request('email'))->first();

                if(request('send_method') == 'paypal'){
                    $this->storeExchange($user, 'complete');
                    return redirect()->route('client.send.create')->with('message', 'Successfully exchange & user added to database... Send by paypal... Please Change Your Default Password : 123456789');
                }

                $this->storeExchange($user);
                return redirect()->route('client.send.create')->with('message', 'Successfully exchange & user added to database... Please pay & confirm your status... Please Change Your Default Password : 123456789');
            }
        }else{

            if(request('send_method') == 'paypal'){
                $this->storeExchange($user, 'complete');
                return redirect()->route('client.send.create')->with('message', 'Successfully exchange & user added to database... Send by paypal...');
            }

            $this->storeExchange($user);
            return redirect()->route('client.send.create')->with('message', 'Successfully exchange added to database... Please pay & confirm your status...');
        }
    }

    public function storeExchange($user, $client_status = 'pending'){
        $exchange = new Exchange();

        $exchange->user_id = $user->id;
        $exchange->send_currency = request('send_currency');
        $exchange->received_currency = request('received_currency');
        $exchange->send_amount = request('send_amount');
        $exchange->received_amount = request('received_amount');
        $exchange->send_method = request('send_method');
        $exchange->received_method = request('received_method');
        $exchange->send_method_id = request('send_method_id');
        $exchange->received_method_id = request('received_method_id');
        $exchange->admin_received_id = request('admin_received_id');
        $exchange->fee = request('fee');
        $exchange->exchange_id = uniqid();
        $exchange->review = request('review');
        $exchange->client_status = $client_status;
        $exchange->admin_status = 'pending';
        $exchange->status = 'pending';
        $exchange->save();
    }
}
