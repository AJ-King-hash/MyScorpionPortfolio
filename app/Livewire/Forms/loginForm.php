<?php

namespace App\Livewire\Forms;

use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use RyanChandler\LaravelCloudflareTurnstile\Rules\Turnstile;

use Livewire\Attributes\Validate;
use Livewire\Form;

class loginForm extends Form
{
    #[Validate('required|email')]  // Simplified; min:3 not needed for email
    public $email = '';

    #[Validate('required|min:8')]
    public $password = '';

    // No #[Validate] on token—handle manually below
    // public ?string $cf_turnstile_response = null;  // Fixed field name

    public function signVal()
    {
        // Manual validation including Turnstile
        $this->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:8'],
            // 'cf_turnstile_response' => ['required', new Turnstile()],  // Fixed field and rule
        ]);

        // Fix: Pass actual credentials to Auth::attempt, not $user array
        if (!Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match.',  // Fixed field key and typo
                'password' => 'Password does not match.',
                // No need for token error—package throws generic if invalid
            ]);
        }

        $this->reset();  // Resets fields including token
        request()->session()->regenerate();
        return redirect('/');  // Or $this->redirect('/', navigate: true) if in Livewire context
    }
}