<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\testimonial\StoreRequest;
use App\Http\Requests\testimonial\UpdateRequest;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Testimonials";
        $testimonials = Testimonial::all();
        return view('admin.testimonial.index',compact('title','testimonials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Testimonials";
        return view('admin.testimonial.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $image = $request->file('image');

        $newName = uniqid() . '.' . $image->getClientOriginalExtension();

        $image->storeAs("/public/testimonial/$newName");

        $data['image'] = $newName;

        Testimonial::create($data);

        return to_route('dashboard.testimonials.index')->with('success','Testimonial has been created');
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
    public function edit(Testimonial $testimonial)
    {
        $title = "Testimonials";
        return view('admin.testimonial.edit',compact('title','testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Testimonial $testimonial)
    {
        $data = $request->validated();

        if($request->has('image'))
        {
            $image = $request->file('image');

            Storage::delete("/public/testimonial/$testimonial->image");

            $newName = uniqid() . '.' . $image->getClientOriginalExtension();

            $image->storeAs("/public/testimonial",$newName);

            $data['image'] = $newName;
        }

        $testimonial->update($data);

        return to_route('dashboard.testimonials.index')->with('success','Testimonial has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonial $testimonial)
    {
        Storage::delete("/public/testimonial/$testimonial->image");
        $testimonial->delete();
        return to_route('dashboard.testimonials.index')->with('success','Deleted successfully');
    }
}
