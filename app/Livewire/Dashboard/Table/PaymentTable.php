<?php

namespace App\Livewire\Dashboard\Table;

use App\Models\UserOrder;
use Livewire\Component;

class PaymentTable extends Component
{
    public $search;

    public function render()
    {
        return view('livewire.dashboard.table.payment-table',[
            'payments'=>$this->getData($this->search)
        ]);
    }

    public function getData($search)
    {
        return UserOrder::where('status','pending')->with('user','order')
            ->whereHas('user', function($query) use ($search) {
                $query->where('name', 'like', '%'.$search.'%')
                    ->orWhere('email', 'like', '%'.$search.'%');
            })
            ->paginate(10);
    }
}
