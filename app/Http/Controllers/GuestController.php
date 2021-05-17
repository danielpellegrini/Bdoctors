<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Department;
use App\MedicalService;
use App\Message;
use App\User;
use App\UserDetail;
use App\Vote;
use App\Review;
use Illuminate\Support\Facades\Auth;
use MessagesSeeder;

class GuestController extends Controller
{
    public function index()

    {
        $users= User::all();
        $userDetails= UserDetail::all();
        $departments = Department::all();

         return view('homepage', compact('users', 'userDetails', 'departments'));
    }



    public function advance()

    {

         return view('advanced');

    }



    public function show($id)
    {

        $user = User::where('id', $id)->first();
        $reviews = Review::where('user_id', $id)->orderBy('created_at', 'desc')->paginate(5);
        $votes = Vote::all();
        $medicalServices = MedicalService::all();
        $activeSponsor = $user->sponsors()->orderBy('id', 'desc')->first();

        if ($activeSponsor != null ) {
            $activeSponsor = $user->sponsors()->orderBy('id', 'desc')->first()->pivot;
        }

        $chosenSponsor = $user->sponsors()->orderBy('id', 'desc')->first();
        return view('showDoc', compact('user', 'votes', 'reviews', 'activeSponsor', 'chosenSponsor', 'medicalServices'));

    }

}
