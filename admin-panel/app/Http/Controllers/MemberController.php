<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = Member::all();
        return view("members.index")->with(['members' => $members]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('members.new');
    }

    public function createMember(array $validatedData)
    {
        $member = new Member();

        $member->first_name = $validatedData['first_name'];
        $member->last_name = $validatedData['last_name'];
        $member->email = $validatedData['email'];
        $member->phone_no = $validatedData['phone_no'];
        $member->password = Hash::make($validatedData['password']);

        $member->save();

        return $member;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:members',
            'phone_no' => 'required|unique:members',
            'password' => 'required|min:6|max:20|regex:/[A-Z]/|regex:/[a-z]/|regex:/[0-9]/|regex:/[@$!%*?&]/',
        ]);

        if ($validatedData) {

            $member = $this->createMember($validatedData);

            return redirect('/members')->with('success', 'Member added successfully.');
        } else {
            return redirect()->back()->withErrors("default error")->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $member = Member::find($id);
        return view('members.edit', ['member' => $member]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $id)
    {
        $member = Member::find($id);
        $member->update($request->all());
        return redirect('members')->with("success", "Item has been Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::find($id);
        $member->delete();
        return redirect('members')->with("success", "Item has been deleted");
    }
}
