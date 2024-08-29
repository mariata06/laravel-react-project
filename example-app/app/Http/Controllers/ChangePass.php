<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Illuminate\Support\Facades\Hash;

class ChangePass extends Controller
{
    public function CPassword () {
        return view('admin.body.change_password');
    }

    public function UpdatePassword (Request $request) {
        $validatDtat = $request->validate([
            'oldpassword' =>'required',
            'password' => 'required|confirmed'

        ]);

        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldpassword, $hashedPassword)) {
            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();
            Auth::logout();
            return redirect()->route('login')->with('success', 'Password is Changed Successfully');
        } else {
            return redirect()->route('login')->with('error', 'Current Password is Invalid');
        }
    }

    public function PUpdate() {
        if(Auth::user()) {
            $user = user::find(Auth::user()->id);
            if($user) {
                return view('admin.body.update_profile', compact('user'));
            }
        }
    }
}
