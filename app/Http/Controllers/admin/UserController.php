<?php

namespace App\Http\Controllers\Admin;

use App\Department;
use App\Http\Controllers\Controller;
use App\User;
use App\UserDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {
        return redirect()->route('public.homepage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /* return view('doctor_view.dashboard') */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users = User::all();
        $user = Auth::user();
        $departments = Department::all();
        $userDetail = UserDetail::where('id', $id)->first();
        return view('doctor_view.edit', compact('users', 'user', 'departments', 'userDetail'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user, $id)
    {

        $userData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'address' => 'required'
            /* 'password' => 'required' */

        ]);

        $userDetailData = $request->validate([
            'pic' => 'nullable',
            'phone' => 'required',
            'curriculum' => 'nullable'
        ]);



        if ($request->file('pic') !== null) {
            $path = $request->file('pic')->store('storage/images');
        }

        $user = Auth::user();
        $userDetail = UserDetail::where('id', $id)->first();
        $user->departments()->attach($request['departments']);

        if (isset($path)) {
            $userDetailData['pic'] = $path;
        }

        $user->update($userData);
        $userDetail->update($userDetailData);

        return redirect()->route('dashboard');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = Auth::user();
        $user->delete();

        return redirect()->route('public.homepage');
    }
}
