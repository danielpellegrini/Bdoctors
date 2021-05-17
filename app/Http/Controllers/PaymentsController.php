<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Sponsor;


use Illuminate\Http\Request;
use App\User;

use Braintree\Transaction as Braintree_Transaction;

class PaymentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function make(Request $request)

    {
        $user = Auth::user();
        $sponsors = Sponsor::all();

        $activeSponsor = Auth::user()->sponsors()->orderBy('id', 'desc')->first();

        if ($activeSponsor != null) {
            $activeSponsor = Auth::user()->sponsors()->orderBy('id', 'desc')->first()->pivot;
        }

        $chosenSponsor = Auth::user()->sponsors()->orderBy('id', 'desc')->first();

        $payload = $request->input('payload', false);
        $payment_method_nonce = $request->get('payment_method_nonce');
        $status = Braintree_Transaction::sale([
            'amount' => '10.00',
            'paymentMethodNonce' => $payment_method_nonce,
            'options' => [
                'submitForSettlement' => True
            ]
        ]);

        return view('layouts.guest/partials.checkout', compact('status','user','activeSponsor','chosenSponsor','sponsors'));
    }
}
