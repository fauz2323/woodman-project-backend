<?php

namespace App\Livewire\Dashboard\Card;

use Livewire\Component;

class UserDetailCard extends Component
{
    public $user;
    public function mount($user) {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.dashboard.card.user-detail-card');
    }
}
