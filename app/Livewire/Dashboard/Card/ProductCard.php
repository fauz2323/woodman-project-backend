<?php

namespace App\Livewire\Dashboard\Card;

use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class ProductCard extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        return view('livewire.dashboard.card.product-card',[
            'products' => $this->getData($this->search)
        ]);
    }

    public function getData($search) {
        return Product::where('name', 'like', '%'.$search.'%')->with('images')->paginate(10);
    }
}
