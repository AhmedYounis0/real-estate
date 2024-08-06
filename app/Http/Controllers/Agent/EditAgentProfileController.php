<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\Agent\UpdateAgentRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class EditAgentProfileController extends Controller
{
    public function edit()
    {
        $title = "Edit Profile";
        return view('theme.agent.profile', compact('title'));
    }

    public function update(UpdateAgentRequest $request)
    {
        $data = $request->validated();
        $user = Auth::user();

        if ($request->hasFile('image')) {
            // Check if the old image exists before deleting
            if ($user->image && Storage::disk('public')->exists('agent/' . $user->image)) {
                Storage::disk('public')->delete('agent/' . $user->image);
            }

            // Store new image
            $image = $request->file('image');
            $newImageName = $user->id . '_' . time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('agent', $newImageName, 'public');

            $data['image'] = $newImageName;
        }

        $user->update($data);

        return redirect()->route('agent.profile')->with('status', 'Profile updated successfully!');
    }

}
