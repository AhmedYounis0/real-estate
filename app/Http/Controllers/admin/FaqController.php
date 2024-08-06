<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\faq\StoreFaqRequest;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'FAQ';
        $faqs = Faq::all();
        return view('admin.faq.index', compact('title', 'faqs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'FAQ';
        return view('admin.faq.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFaqRequest $request)
    {
        $data = $request->validated();

        Faq::create($data);

        return to_route('dashboard.faqs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Faq $faq)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Faq $faq)
    {
        $title = 'FAQ';
        return view('admin.faq.edit', compact('title', 'faq'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreFaqRequest $request, Faq $faq)
    {
        $data = $request->validated();

        $faq->update($data);

        return to_route('dashboard.faqs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Faq $faq)
    {
        $faq->delete();

        return to_route('dashboard.faqs.index');
    }
}
