<?php

namespace App\Http\Controllers\Agent;

use App\Http\Controllers\Controller;
use App\Http\Requests\property\StorePropertyRequest;
use App\Http\Requests\property\UpdatePropertyRequest;
use App\Models\Amenity;
use App\Models\Location;
use App\Models\Order;
use App\Models\Package;
use App\Models\Property;
use App\Models\Type;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PropertyController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','check.property.limit'])->only(['create','store']);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'All Properties';
        $properties = Property::with('location','type','amenities')->where('user_id',Auth::user()->id)->get();
        return view('theme.agent.properties', compact('title','properties'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Add Property';
        $locations = Location::all();
        $types = Type::all();
        $amenities = Amenity::all();
        $user = Auth::user();

        $activeOrders = Order::with('package')
            ->where('user_id',$user->id)
            ->where('status','active')
            ->get();

        $featuredCount = 0;

        foreach ($activeOrders as $order)
        {
            if ($order->package->featured_properties > 0)
            {
                $featuredCount += $order->package->featured_properties;
            }
        }

        $featuredProperties = Property::where('user_id',$user->id)
            ->whereNotNull('order_id')
            ->where('is_featured',1)
            ->count();

//        dd($featuredProperties);

        return view('theme.agent.property-add', compact(
            'title',
            'locations',
            'types',
            'amenities',
            'featuredCount',
            'featuredProperties'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $data = $request->validated();

        $image = $request->image;

        $newName = uniqid() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('public/preview', $newName);

        $data['image'] = $newName;

        $user = Auth::user();

        $data['user_id'] = $user->id;

        $order = Order::where('user_id', Auth::user()->id)
            ->where('credit', '!=', 0)
            ->firstOrFail();

        $data['order_id'] = $order->id;

        $property = Property::create($data);

        $order->decrement('credit');

        $property->amenities()->attach($request->amenities);

        return to_route('agent.properties.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Property $property)
    {
        if (Auth::user()->id == $property->user_id)
        {
            $title = 'Edit Property';
            $locations = Location::all();
            $types = Type::all();
            $amenities = Amenity::all();
            $activeOrders = Order::with('package')
                ->where('user_id',Auth::user()->id)
                ->where('status','active')
                ->get();

            $featuredCount = 0;

            foreach ($activeOrders as $order)
            {
                if ($order->package->featured_properties > 0)
                {
                    $featuredCount += $order->package->featured_properties;
                }
            }

            $featuredProperties = Property::where('user_id',Auth::user()->id)
                ->whereNotNull('order_id')
                ->where('is_featured',1)
                ->count();

            return view('theme.agent.property-edit', compact(
                'property',
                'title',
                'locations',
                'types',
                'amenities',
                'featuredCount',
                'featuredProperties'
            ));
        }
        abort(403);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePropertyRequest $request, Property $property)
    {
        if (Auth::user()->id == $property->user_id)
        {
            $data = $request->validated();

            if ($request->hasFile('image'))
            {
                Storage::delete("public/preview/$property->image");

                $image = $request->image;

                $newName = uniqid() . '.' . $image->getClientOriginalExtension();

                $image->storeAs('public/preview', $newName);

                $data['image'] = $newName;
            }

            $property->update($data);

            if ($request->has('amenities')) {
                $property->amenities()->sync($request->amenities);
            }

            return to_route('agent.properties.index');
        }
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Property $property)
    {
        if (Auth::user())
        {
        $user = Auth::user();

            $property->delete();

            $order = Order::where('user_id',$user->id)->where('id',$property->order_id)->first();

            $order->increment('credit');

            return redirect()->back();
        }
        abort(403);
    }
}
