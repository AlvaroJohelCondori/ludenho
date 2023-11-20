<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Material;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.products.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        $materials = Material::all();

        return view('admin.products.create', compact('categories', 'materials'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductRequest $request)
    {
        //return Storage::put('products', $request->file('product_image'));
        $product = Product::create($request->all());

        if ($request->file('product_image')) {
            $url = Storage::put('products', $request->file('product_image'));
            $product->image()->create([
                'url' => $url,
            ]);
        }
        if ($request->materials) {
            $product->materials()->attach($request->materials);
        }
        return redirect()->route('admin.products.index')->with('create', 'EL producto se creó correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::all();
        $materials = Material::all();

        return view('admin.products.edit', compact('product', 'categories', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        //return Storage::put('products', $request->file('product_image'));
        $product->update($request->all());

        if ($request->file('product_image')) {
            $url = Storage::put('products', $request->file('product_image'));
            if ($product->image) {
                Storage::delete($product->image->url);
                $product->image->update([
                    'url' => $url
                ]);
            } else {
                $product->image()->create([
                    'url' => $url
                ]);
            }
        }
        if ($request->materials) {
            $product->materials()->sync($request->materials);
        }
        return redirect()->route('admin.products.index')->with('create', 'EL producto se actualizó correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('admin.products.index')->with('delete', 'EL producto se elminó correctamente.');
    }
}
