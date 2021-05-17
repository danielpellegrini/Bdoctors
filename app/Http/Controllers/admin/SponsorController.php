<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Sponsor;
use Carbon\Carbon;
use App\User;
use Illuminate\Support\Facades\Auth;


use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index(){

        $sponsors = Sponsor::all();

        $user = Auth::user();

        return view('layouts.guest/partials.checkout',compact('sponsors','user'));
    }



    public function store(Request $request){

        $user = Auth::user();
        $user->sponsors()->attach($request['sponsor']);

        return redirect()->route('dashboard');

    }
}
