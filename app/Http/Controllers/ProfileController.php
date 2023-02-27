<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileStoreRequest;
use Auth;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('pages.prof', ['user'	=>	$user]);
    }

    public function store(ProfileStoreRequest $request)
    {
        $user = Auth::user();
        $user->edit($request->all());
        $user->generatePassword($request->get('password'));
        $user->uploadAvatar($request->file('avatar'));

        return redirect()->back()->with('status', 'Profile updated successfully!');
    }
}
