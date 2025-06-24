<?php

namespace App\Livewire\Dashboard\Table;

use App\Models\UserOrder;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;
use Livewire\WithPagination;

class PaymentTable extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $search;
    public $type;

    public function render()
    {
        return view('livewire.dashboard.table.payment-table', [
            'payments' => $this->getData($this->search, $this->type)
        ]);
    }

    public function getData($search, $type)
    {
        if ($type == 'all') {
            return UserOrder::with('user', 'items')
                ->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                })
                ->paginate(10);
        } else {
            return UserOrder::whereIn('status', [$type])->with('user', 'items')
                ->whereHas('user', function ($query) use ($search) {
                    $query->where('name', 'like', '%' . $search . '%')
                        ->orWhere('email', 'like', '%' . $search . '%');
                })
                ->paginate(10);
        }
    }

    public function cancelOrder($id)
    {
        $payment = UserOrder::find(Crypt::decrypt($id));
        $payment->status = 'canceled';
        $payment->save();
    }
}
