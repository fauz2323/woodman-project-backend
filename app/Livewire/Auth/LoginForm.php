<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginForm extends Component
{
    public $email, $password;

    public function render()
    {
        return view('livewire.auth.login-form');
    }

    public function login() {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = User::where('email', $this->email)->first();

        if ($user && Hash::check($this->password, $user->password) && $user->role == 'admin') {
            Auth::loginUsingId($user->id);
            return redirect()->route('home');
        } else {
            session()->flash('error', 'Invalid email or password');
        }

    }
}
