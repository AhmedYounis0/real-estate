<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\Amenity;
use App\Models\Location;
use App\Models\Property;
use App\Models\Type;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $title = 'Property Listing';
        $locations = Location::all();
        $types = Type::all();
        $amenities = Amenity::all();
        $properties = Property::with(['location','type'])
            ->whereNotNull('order_id')
            ->orderBy('is_featured','DESC')
            ->paginate(6);
        return view('theme.properties.index', compact(
            'title',
            'locations',
            'types',
            'amenities',
            'properties'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        $title = 'Property Details';
        $property->load(['location','type','amenities']);
        $relatedProperties = Property::with(['location','type'])
            ->whereNotNull('order_id')
            ->where('id','!=',$property->id)
            ->where('type_id',$property->type->id)
            ->orderBy('is_featured','DESC')
            ->get()
            ->take(2);
        return view('theme.properties.show', compact(
            'title',
            'property',
            'relatedProperties'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Property $property)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        //
    }
}
