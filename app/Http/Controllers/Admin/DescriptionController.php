<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Description;
use Illuminate\Http\Request;

class DescriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $descriptions = Description::all();

        return view('admin.descriptions.index', compact('descriptions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.descriptions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'overview' => 'required',
        ]);

        Description::create($request->all());

        return redirect()->route('admin.descriptions.index')->with('create', 'La descripción se creó correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Description $description)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Description $description)
    {
        return view('admin.descriptions.edit', compact('description'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Description $description)
    {
        $request->validate([
            'overview' => 'required',
        ]);

        $description->update([
            'overview' => $request->input('overview'),
        ]);

        return redirect()->route('admin.descriptions.index')->with('create', 'La descripción se actualizó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Description $description)
    {
        $description->delete();

        return redirect()->route('admin.descriptions.index')->with('delete', 'La descripción se elminó correctamente.');
    }
}
