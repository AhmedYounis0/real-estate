<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\package\StorePackageRequest;
use App\Models\Package;
use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Packages';
        $packages = Package::all();
        return view('admin.package.index', compact('title','packages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Packages';
        return view('admin.package.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageRequest $request)
    {
        $data = $request->validated();

        Package::create($data);

        return to_route('dashboard.packages.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Package $package)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Package $package)
    {
        $title = 'Packages';
        return view('admin.package.edit', compact('package','title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StorePackageRequest $request, Package $package)
    {
        $data = $request->validated();

        $package->update($data);

        return to_route('dashboard.packages.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Package $package)
    {
        $package->delete();

        return to_route('dashboard.packages.index');
    }
}
