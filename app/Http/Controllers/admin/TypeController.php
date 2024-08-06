<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\type\StoreRequest;
use App\Http\Requests\type\UpdateRequest;
use App\Models\Type;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Types';
        $types = Type::all();
        return view('admin.type.index',compact('title','types'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Types';
        return view('admin.type.create',compact('title'));
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
                Type::create(['name' => $value]);
            }
        }
        return to_route('dashboard.types.index')->with('success','Created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        $title = 'Types';
        return view('admin.type.edit',compact('title','type'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Type $type)
    {
        $data = $request->validated();
        $type->update($data);
        return to_route('dashboard.types.index')->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return to_route('dashboard.types.index')->with('success','Deleted successfully');
    }
}
