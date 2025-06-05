<?php

namespace App\Livewire\Dashboard\Table;

use App\Models\UserOrder;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;



    public function render()
    {
        return view('livewire.dashboard.table.payment-table', [
            'payments' => $this->getData($this->search)
        ]);
    }

    public function getData($search)
    {
        return UserOrder::whereIn('status', ['pending', 'waiting'])->with('user', 'items')
            ->whereHas('user', function ($query) use ($search) {
                $query->where('name', 'like', '%' . $search . '%')
                    ->orWhere('email', 'like', '%' . $search . '%');
            })
            ->paginate(10);
    }
}
