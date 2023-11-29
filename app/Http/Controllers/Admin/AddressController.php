<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $addresses = Address::all();

        return view('admin.address.index', compact('addresses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.address.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'address_office' => 'required',
            'address_foto' => 'required',
        ]);

        $address_foto = null;

        if ($request->hasFile('address_foto')) {
            $address_foto = Storage::put('addresses', $request->file('address_foto'));
        }

        $data = $request->all();
        $data['address_foto'] = $address_foto;

        Address::create($data);

        return redirect()->route('admin.address.index')->with('create', 'La dirección se creó correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Address $address)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Address $address)
    {
        return view('admin.address.edit', compact('address'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Address $address)
    {
        $request->validate([
            'address_office' => "required",
        ]);

        if ($request->hasFile('address_foto')) {
            $request->validate([
                'address_foto' => 'required',
            ]);

            Storage::delete($address->address_foto);

            $address_foto = $request->file('address_foto')->store('addresses');

            $address->update([
                'address_foto' => $address_foto,
                'address_office' => $request->input('address_office'),
            ]);
        } else {
            $address->update($request->except('address_foto'));
        }

        return redirect()->route('admin.address.index')->with('create', 'La dirección se actualizó correctamente correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Address $address)
    {
        if ($address->address_foto) {
            if (Storage::delete($address->address_foto)) {
                $address->delete();
            } else {
                return redirect()->route('admin.address.index')->with('error', 'Error al eliminar el archivo.');
            }
        } else {
            $address->delete();
        }

        return redirect()->route('admin.address.index')->with('delete', 'La dirección se elminó correctamente.');
    }
}
