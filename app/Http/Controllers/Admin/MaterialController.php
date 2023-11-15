<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $materials = Material::all();

        return view('admin.materials.index', compact('materials'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.materials.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'material_name' => 'required',
            'material_slug' => 'required|unique:materials,material_slug',
            'material_color' => 'required',
            'material_description' => 'required',
        ]);

        Material::create($request->all());
        return redirect()->route('admin.materials.index')->with('create', 'EL material se creó correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Material $material)
    {
        view('admin.materials.show', compact('material'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Material $material)
    {
        return view('admin.materials.edit', compact('material'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Material $material)
    {
        $request->validate([
            'material_name' => 'required',
            'material_slug' => "required|unique:materials,material_slug,$material->id",
            'material_color' => 'required',
            'material_description' => 'required',
        ]);

        $material->update($request->all());
        return redirect()->route('admin.materials.index')->with('update', 'El material se actualizó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Material $material)
    {
        $material->delete();
        return redirect()->route('admin.materials.index')->with('delete', 'El material se eliminó correctamente.');
    }
}
