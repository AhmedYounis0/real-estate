<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    public function edit()
    {
        $title = 'Change Password';
        return view('theme.agent.change-password',compact('title'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'current_password' => ['required','current_password'],
            'password' => 'required|min:8|confirmed',
        ]);

        $request->user()->update($data);

        return redirect()->route('agent.password')->with('success','Your password has been changed');

    }
}
