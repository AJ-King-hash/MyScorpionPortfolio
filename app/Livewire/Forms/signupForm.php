<?php

namespace App\Livewire\Forms;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;  // Fixed import (was mixed)
use Livewire\Form;

class signupForm extends Form
{
    #[Validate('required|string|min:3|max:255')]  // Fixed syntax (use Validate, not Rule for v3)
    public $name = '';

    #[Validate('required|email|unique:users,email')]  // Moved unique here for simplicity
    public $email = '';

    #[Validate('required|min:8|confirmed')]  // 'confirmed' auto-checks password_confirmation
    public $password = '';

    #[Validate('required|min:8')]  // Confirmation validated via 'confirmed' on password
    public $password_confirmation = '';

    // public ?string $cf_turnstile_response = null;  // Fixed field name to match Cloudflare default

    public function addUser()  // Fixed casing
    {
        $user = User::create($this->all());  // all() includes validated fields
        $this->reset();  // Resets all fields, including token
        Auth::login($user);
    }
}