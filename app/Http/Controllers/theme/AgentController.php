<?php

namespace App\Http\Controllers\theme;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Agents';
        $agents = User::where('role', 'agent')->paginate(10);
        return view('theme.agents.index', compact('agents', 'title'));
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
    public function show(String $slug)
    {
        $user = User::where('slug',$slug)->firstOrFail();
        $properties = $user->properties()->orderBy('is_featured', 'desc')->paginate(6);
        $title = 'Agent Details';
        return view('theme.agents.show', compact(
            'user',
            'title',
            'properties'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
