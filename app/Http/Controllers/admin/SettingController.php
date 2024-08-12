<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\setting\StoreSettingRequest;
use App\Http\Requests\setting\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Stripe\Util\Set;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Settings';
        $settings = Setting::all();
        return view('admin.setting.index', compact('settings', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Settings';
        return view('admin.setting.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSettingRequest $request)
    {
        $data = $request->validated();

        if ($request->image == null && $request->value == null)
        {
            return redirect()->back()->with('status','Input value or image is required');
        }

        if ($request->hasFile('image'))
        {
            $image = $request->file('image');

            $newName = uniqid() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('/public/settings',$newName);

            $data['image'] = $newName;
        }

        Setting::create($data);

        return to_route('dashboard.settings.index')->with('status','Data has been successfully saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Setting $setting)
    {
        $title = 'Settings';
        return view('admin.setting.edit', compact('title','setting'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $data = $request->validated();

        if ($request->hasFile('image'))
        {
            Storage::delete('/public/settings/'.$setting->image);

            $image = $request->file('image');

            $newName = uniqid() . '.' . $image->getClientOriginalExtension();

            $image->storeAs('/public/settings',$newName);

            $data['image'] = $newName;
        }

        $setting->update($data);

        return to_route('dashboard.settings.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Setting $setting)
    {
        if (Storage::exists('public/settings/'.$setting->image))
        {
            Storage::delete('public/settings/'.$setting->image);
        }

        $setting->delete();

        return redirect()->back();
    }
}
