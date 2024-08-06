<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\amenity\StoreRequest;
use App\Http\Requests\amenity\UpdateRequest;
use App\Models\Amenity;
use Illuminate\Http\Request;

class AmenityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Amenities';
        $amenities = Amenity::all();
        return view('admin.amenity.index',compact('title','amenities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Amenities';
        return view('admin.amenity.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        foreach($data['name'] as $value)
        {
            if(!empty($value))
            {
                Amenity::create(['name' => $value]);
            }
        }
        return to_route('dashboard.amenities.index')->with('success','Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Amenity $amenity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Amenity $amenity)
    {
        $title = 'Amenities';
        return view('admin.amenity.edit',compact('title','amenity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Amenity $amenity)
    {
        $data = $request->validated();
        $amenity->update($data);
        return to_route('dashboard.amenities.index')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Amenity $amenity)
    {
        $amenity->delete();
        return to_route('dashboard.amenities.index')->with('success','Deleted successfully');
    }
}
