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

        if ($request->hasFile('product_images')) {
            foreach ($request->file('product_images') as $image) {
                $url = Storage::put('products', $image);
                $product->images()->create([
                    'url' => $url,
                ]);
            }
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
        $this->authorize('author', $product);

        $categories = Category::all();
        $materials = Material::all();

        return view('admin.products.edit', compact('product', 'categories', 'materials'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ProductRequest $request, Product $product)
    {
        $this->authorize('author', $product);
        //return Storage::put('products', $request->file('product_image'));

        // Obtén las URLs de las imágenes antes de eliminarlas de la base de datos
        $imageUrls = $product->images()->pluck('url')->toArray();

        $product->update($request->all());

        if ($request->hasFile('product_images')) {
            // Eliminar las imágenes existentes si las hay
            $product->images()->delete();

            // Eliminar los archivos físicos asociados a las imágenes eliminadas
            foreach ($imageUrls as $imageUrl) {
                Storage::delete($imageUrl);
            }

            // Subir y agregar las nuevas imágenes
            foreach ($request->file('product_images') as $image) {
                $url = Storage::put('products', $image);
                $product->images()->create([
                    'url' => $url,
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
        $this->authorize('author', $product);
        if ($product->images) {
            Storage::delete($product->images->url);
        }

        if ($product->images) {
            $product->images->delete();
        }

        $product->delete();
        return redirect()->route('admin.products.index')->with('delete', 'EL producto se elminó correctamente.');
    }
}
