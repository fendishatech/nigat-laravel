<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $req)
    {
        $user = User::where(['phone_no' => $req->phone_no])->first();

        $validatedData = $req->validate([
            'phone_no' => ['required'],
            'password' => ['required']
        ]);

        if ($validatedData) {
            if ($user && Hash::check($req->password, $user->password)) {
                // success
                Auth::login($user);
                return redirect("/home");
            } else {
                return redirect()->back()->withErrors([
                    'custom_error' => 'Wrong password or username!',
                ])->withInput();
            }
        } else {
            return redirect()->back()->withErrors("Wrong password or username!")->withInput();
        }
    }


    public function logout(Request $req)
    {
        Auth::logout();
        return redirect('/');
    }
}
