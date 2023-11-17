<?php

namespace App\Livewire\Admin;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductsIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";

    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $products = Product::where('user_id', auth()->user()->id)
            ->where('product_name', 'LIKE', '%' . $this->search . '%')
            ->latest('id')
            ->paginate(5);

        return view('livewire.admin.products-index', compact('products'));
    }
}
