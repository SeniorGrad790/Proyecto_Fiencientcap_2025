<?php

namespace App\Livewire;

use Livewire\Component;

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
            session()->regenerate();
            return redirect()->intended('/');
        }

        $this->addError('email', 'Credenciales inválidas.');
    }

    public function loginAsGuest()
    {
        \Log::info('Usuario invitado accediendo al sistema');
        session(['es_invitado' => true]);
        return redirect()->route('invitado');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
