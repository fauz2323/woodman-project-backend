<?php

namespace App\Livewire\Dashboard\Card;

use App\Models\Product;
use Illuminate\Support\Facades\Crypt;
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

    public function add() {
        return redirect()->route('admin.product.add');
    }

    public function edit($id) {
        return redirect()->route('admin.product.edit', ['id' => $id]);
    }

    public function deleteData($id) {
        $id = Crypt::decrypt($id);
        $product = Product::find($id);
        if ($product) {
            $product->delete();
            session()->flash('message', 'Product deleted successfully.');
        } else {
            session()->flash('error', 'Product not found.');
        }
    }
}
