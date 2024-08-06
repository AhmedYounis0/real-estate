<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\blog\StoreRequest;
use App\Http\Requests\blog\UpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Blog';
        $blogs = Blog::all();
        return view('admin.blog.index',compact('title','blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Blog';
        return view('admin.blog.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        $data = $request->validated();

        $image = $request->file('image');

        $newName = uniqid() . '.' . $image->getClientOriginalExtension();

        $image->storeAs('/public/blog',$newName);

        $data['image'] = $newName;

        Blog::create($data);

        return to_route('dashboard.blogs.index')->with('success','Blog Post has been created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $title = 'Blog';
        return view('admin.blog.edit',compact('title','blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, Blog $blog)
    {

        $data = $request->validated();

        if($request->has('image'))

        {
            $image = $request->file('image');
            Storage::delete("/public/blog/$blog->image");
            $newName = uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs("public/blog",$newName);
            $data['image'] = $newName;
        }

        $blog->update($data);

        return to_route('dashboard.blogs.index')->with('success','Blog Post has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        Storage::delete("public/blog/$blog->image");
        $blog->delete();
        return to_route('dashboard.blogs.index')->with('success','Deleted Successfully');
    }
}
