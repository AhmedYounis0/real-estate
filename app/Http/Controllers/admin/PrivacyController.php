<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\privacy\StoreRequest;
use App\Http\Requests\privacy\UpdateRequest;
use App\Models\Privacy;
use Illuminate\Http\Request;


class PrivacyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Privacy";
        $privacies = Privacy::all();
        return view('admin.privacy.index',compact('title','privacies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Privacy";
        return view('admin.privacy.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        Privacy::create($data);
        return to_route('dashboard.privacies.index')->with('success','Privacy has been created successfully');
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
    public function edit(Privacy $privacy)
    {
        $title = 'Privacy';
        return view('admin.privacy.edit',compact('title','privacy'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request,Privacy $privacy)
    {
        $data = $request->validated();
        $privacy->update($data);
        return to_route('dashboard.privacies.index')->with('success','Privacy has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Privacy $privacy)
    {
        $privacy->delete();
        return to_route('dashboard.privacies.index')->with('success','Deleted successfully');
    }
}
