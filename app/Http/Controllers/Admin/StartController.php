<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Start;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StartController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $starts = Start::all();

        return view('admin.start.index', compact('starts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.start.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'start_title' => 'required|unique:starts,start_title',
            'start_subtitle' => 'required',
            'start_state' => 'required',
            'start_image' => 'required',
        ]);
        $start = Start::create($request->all());

        if ($request->file('start_image')) {
            $url = Storage::put('starts', $request->file('start_image'));
            $start->image()->create([
                'url' => $url,
            ]);
        }

        return redirect()->route('admin.starts.index')->with('create', 'La portada se creó correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Start $start)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Start $start)
    {
        return view('admin.start.edit', compact('start'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Start $start)
    {
        $request->validate([
            'start_title' => "required|unique:starts,start_title,$start->id",
            'start_subtitle' => 'required',
            'start_state' => 'required',
            'start_image' => 'required',
        ]);

        $start->update($request->all());

        if ($request->file('start_image')) {
            $url = Storage::put('starts', $request->file('start_image'));
            if ($start->image) {
                Storage::delete($start->image->url);
                $start->image->update([
                    'url' => $url
                ]);
            } else {
                $start->image()->create([
                    'url' => $url
                ]);
            }
        }

        return redirect()->route('admin.starts.index')->with('create', 'La portada se actualizó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Start $start)
    {
        if ($start->image) {
            Storage::delete($start->image->url);
        }

        if ($start->image) {
            $start->image->delete();
        }

        $start->delete();

        return redirect()->route('admin.starts.index')->with('delete', 'La portada se elminó correctamente.');
    }
}
