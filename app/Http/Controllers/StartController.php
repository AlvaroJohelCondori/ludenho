<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Start;
use Illuminate\Http\Request;

class StartController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $products = Product::all();

        $start = Start::where('start_state', 2)->latest('id')->first();

        return view('start.index', compact('categories', 'start', 'products'));
    }
}
