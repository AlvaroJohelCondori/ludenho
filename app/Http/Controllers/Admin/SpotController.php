<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Spot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SpotController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spots = Spot::orderBy('id', 'desc')->paginate(2);

        return view('admin.spots.index', compact('spots'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.spots.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'spot_title' => 'required|unique:spots,spot_title',
            'spot_description' => 'required',
            'spot_video' => 'required|mimes:mp4,avi,mov,wmv|max:156928',
            'spot_color' => 'required',
        ]);

        $spot_video = null;

        if ($request->hasFile('spot_video')) {
            $spot_video = Storage::put('spots', $request->file('spot_video'));
        }

        $data = $request->all();
        $data['spot_video'] = $spot_video;

        Spot::create($data);

        return redirect()->route('admin.spots.index')->with('create', 'EL spot se creó correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spot $spot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Spot $spot)
    {
        return view('admin.spots.edit', compact('spot'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spot $spot)
    {
        $request->validate([
            'spot_title' => "required|unique:spots,spot_title,$spot->id",
            'spot_description' => 'required',
            'spot_color' => 'required',
        ]);

        if ($request->hasFile('spot_video')) {
            $request->validate([
                'spot_video' => 'file|mimes:mp4,avi,mov,wmv|max:156928',
            ]);

            Storage::delete($spot->spot_video);

            $spot_video = $request->file('spot_video')->store('spots');

            $spot->update([
                'spot_video' => $spot_video,
                'spot_title' => $request->input('spot_title'),
                'spot_description' => $request->input('spot_description'),
                'spot_color' => $request->input('spot_color'),
            ]);
        } else {
            $spot->update($request->except('spot_video'));
        }

        return redirect()->route('admin.spots.index')->with('create', 'EL spot se actualizó correctamente correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Spot $spot)
    {
        if ($spot->spot_video) {
            if (Storage::delete($spot->spot_video)) {
                $spot->delete();
            } else {
                return redirect()->route('admin.spots.index')->with('error', 'Error al eliminar el archivo.');
            }
        } else {
            $spot->delete();
        }

        return redirect()->route('admin.spots.index')->with('delete', 'EL spot se elminó correctamente.');
    }
}
