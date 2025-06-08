<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email = '';
    public $password = '';


    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            \Log::info('Usuario autenticado: ' . $this->email);
            session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        \Log::warning('Intento de inicio de sesión fallido para: ' . $this->email);
        $this->addError('email', 'Credenciales inválidas.');
    }


    public function render()
    {
        return view('livewire.login')->layout('layouts.app');
    }

}
