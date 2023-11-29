<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Category;
use App\Models\Description;
use App\Models\Product;
use App\Models\Start;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $address = Address::latest('id')->first();

        $description = Description::latest('id')->first();

        $products = Product::where('product_status', 2)
            ->where('user_id', 1)
            ->latest('id')
            ->get();

        $start = Start::where('start_state', 2)->latest('id')->first();

        return view('start.index', compact('categories', 'start', 'products', 'address', 'description'));
    }
}
