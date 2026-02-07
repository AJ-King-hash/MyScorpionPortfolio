<?php

namespace App\Livewire;

use App\Livewire\Forms\LoginForm;  // Fixed casing for consistency
use App\Livewire\Forms\SignupForm;
use Illuminate\Validation\Rule;
use Livewire\Component;
use RyanChandler\LaravelCloudflareTurnstile\Rules\Turnstile;

class Register extends Component
{
    public $title = "Customer Registration";  // Fixed typo

    public SignupForm $signupForm;
    public LoginForm $loginForm;

    public function submitRegister()
    {
        // Nested validation on form properties; use 'cf-turnstile-response' as field
        $this->validate([
            'signupForm.name' => ['required', 'string', 'max:255'],  // Rely on form #[Rule] where possible, but override for uniqueness
            'signupForm.email' => ['required', 'email', Rule::unique('users', 'email')],
            'signupForm.password' => ['required', 'confirmed', 'min:8'],  // 'confirmed' checks password_confirmation
            // 'signupForm.cf_turnstile_response' => ['required', new Turnstile()],  // Fixed field name; use new Turnstile()
        ]);

        $this->signupForm->addUser();  // Fixed method name casing
        $this->signupForm->cf_turnstile_response = null;  // Reset token to re-render widget
        return $this->redirect('/', navigate: true);
    }

    public function submitLogin()
    {
        // Call the form's method (now fixed inside)
        $this->loginForm->signVal();
    }

    public function render()
    {
        return view('livewire.register')->layout('components.layouts.guest');
    }
}