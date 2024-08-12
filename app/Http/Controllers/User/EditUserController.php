<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditUserController extends Controller
{
    public function edit()
    {
        $title = 'Edit Profile';
        return view('theme.user.profile', compact('title'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'name' => 'Required|string',
            'email'=> 'Required|string',
            'password'=> 'nullable|string'
        ]);

        // Handle password update
        if ($request->filled('password')) {
            $data['password'] = $request->password;
        } else {
            unset($data['password']);
        }
        // Update the user with the validated data
        Auth::user()->update($data);
        // Redirect to the profile edit route
        return back();
    }

}
