<?php

namespace App\Observers;

use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function creating(Product $product): void
    {
        if (!\App::runningInConsole()) {
            $product->user_id = auth()->user()->id;
        }
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleting(Product $product): void
    {
        if ($product->image) {
            Storage::delete($product->image->url);
        }
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }
}
