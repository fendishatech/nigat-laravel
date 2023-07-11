<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function login(Request $req)
    {
        $member = Member::where(['phone_no' => $req->phone_no])->first();

        $validatedData = $req->validate([
            'phone_no' => ['required'],
            'password' => ['required']
        ]);

        if ($validatedData) {
            if ($member && Hash::check($req->password, $member->password)) {
                // success
                $req->session()->put('member', $member);
                return redirect("/member_home");
            } else {
                return redirect()->back()->withErrors([
                    'custom_error' => 'Wrong password or membername!',
                ])->withInput();
            }
        } else {
            return redirect()->back()->withErrors("Wrong password or membername!")->withInput();
        }
    }

    public function logout(Request $req)
    {
        $req->session()->forget('member');
        return redirect('/');
    }

    public function dashboard()
    {
        return view('members.dashboard');
    }
}
