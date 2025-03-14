<?php

namespace App\Livewire\Dashboard\Form;

use Livewire\Component;

class UserDetailForm extends Component
{
    public $user;

    public function mount($user)
    {
        $this->user = $user;
    }

    public function render()
    {
        return view('livewire.dashboard.form.user-detail-form');
    }
}
