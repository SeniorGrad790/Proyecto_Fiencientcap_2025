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
            session()->regenerate();
            return redirect()->intended('/');
        }

        $this->addError('email', 'Credenciales inválidas.');
    }

    public function loginAsGuest()
    {
        $guest = \App\Models\User::where('email', 'guest@example.com')->first();

        if (!$guest) {
            $guest = \App\Models\User::create([
                'name' => 'Invitado',
                'email' => 'guest@example.com',
                'password' => bcrypt('guest123'), // puedes usar un valor fuerte
            ]);
        }

        Auth::login($guest);
        return redirect()->intended('/');
    }

    public function render()
    {
        return view('livewire.login');
    }
}
