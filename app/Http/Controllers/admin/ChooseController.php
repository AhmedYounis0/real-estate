<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\choose\StoreRequest;
use App\Http\Requests\choose\UpdateRequest;
use App\Models\Choose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ChooseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Why Choose Us";
        $chooses    = Choose::all();
        return view('admin.choose.index',compact('title','chooses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title      = "Why Choose Us";
        return view('admin.choose.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Choose::create($data);

        return to_route('dashboard.chooses.index')->with('success','Choose us has been created successfully');
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
    public function edit(Choose $choose)
    {
        $title      = "Why Choose Us";
        return view('admin.choose.edit',compact('title','choose'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Choose $choose)
    {
        $data = $request->validated();

        $choose->update($data);

        return to_route('dashboard.chooses.index')->with('success','Choose us has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Choose $choose)
    {
        $choose->delete();
        return to_route('dashboard.chooses.index')->with('success','Deleted Successfully');
    }
}
