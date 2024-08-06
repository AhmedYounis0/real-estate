<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\term\StoreRequest;
use App\Http\Requests\term\UpdateRequest;
use App\Models\Term;
use Illuminate\Http\Request;

class TermController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Terms";
        $terms = Term::all();
        return view('admin.term.index',compact('title','terms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Terms";
        return view('admin.term.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        Term::create($data);

        return to_route('dashboard.terms.index')->with('success','Terms has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Term $term)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Term $term)
    {
        $title = "Terms";
        return view('admin.term.edit',compact('title','term'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Term $term)
    {
        $data = $request->validated();

        $term->update($data);

        return to_route('dashboard.terms.index')->with('success','Terms has been updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Term $term)
    {
        $term->delete();

        return to_route('dashboard.terms.index')->with('success','Deleted successfully');
    }
}
