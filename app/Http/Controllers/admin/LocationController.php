<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\location\StoreRequest;
use App\Http\Requests\location\UpdateRequest;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Locations";
        $locations = Location::all();
        return view('admin.location.index',compact('title','locations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Locations';
        return view('admin.location.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $image = $request->file('image');

        $newName = uniqid() . '.' . $image->getClientOriginalExtension();

        $image->storeAs("public/location",$newName);

        $data['image'] = $newName;

        Location::create($data);

        return to_route('dashboard.locations.index')->with('success','Location created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Location $location)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Location $location)
    {
        $title = 'Locations';
        return view('admin.location.edit',compact('title','location'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Location $location)
    {
        $data = $request->validated();

        if($request->has('image'))
        {
            $image = $request->file('image');

            Storage::delete("public/location/$location->image");

            $newName = uniqid() . '.' . $image->getClientOriginalExtension();

            $image->storeAs("public/location",$newName);

            $data['image'] = $newName;

        }

        $location->update($data);

        return to_route('dashboard.locations.index')->with('success','Updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Location $location)
    {
        Storage::delete("public/location/$location->image");

        $location->delete();

        return to_route('dashboard.locations.index')->with('success','Deleted successfully');
    }
}
