<?php

namespace App\Livewire\Dashboard\Table;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
    use WithPagination;
    public $search;
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.dashboard.table.user-table',[
            'users' => $this->getData($this->search)
        ]);
    }

    public function getData($search){
        return User::where('name', 'like', '%'.$search.'%')
            ->orWhere('email', 'like', '%'.$search.'%')
            ->paginate(10);
    }
}
