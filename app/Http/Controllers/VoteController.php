<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Vote;
use App\User;

class VoteController extends Controller
{
    public function voteDoc()

    {
        $votes = Vote::all();

        return view('showDoc', compact('votes'));
    }

    public function sendVote(Request $request, $id)

    {

        $user = User::where('id', $id)->first();
        $user->votes()->attach($request['votes']);

        return redirect()->route('show.doctor',$id);
    }

}


