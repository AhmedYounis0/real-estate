<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateAdminRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function edit(Request $request)
    {
        return view('admin.auth.profile');
    }

    public function update(UpdateAdminRequest $request)
    {
        $data = $request->validated();
        //         Handle image upload
        if ($request->has('image')) {
            $oldImage = Auth::guard('admin')->user()->image;
            Storage::delete("/public/admin/$oldImage");
            $image = $request->file('image');
            $newName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs("public/admin",$newName);
            $data['image'] = $newName;
        }
        // Handle password update
        if ($request->filled('password')) {
            $data['password'] = $request->password;
        } else {
            unset($data['password']);
        }
        // Update the user with the validated data
        Auth::guard('admin')->user()->update($data);
        // Redirect to the profile edit route
        return back()->with('success', 'Profile updated successfully.');
    }

}
