<?php

namespace App\Livewire;

use Auth;
use Classifier\Classifier;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Component;

#[Layout("components.layouts.landing")]
class Welcome extends Component
{
    public $fuzzyRes;
    public $users=[
    ["user_id" => 2, 'rating' => 5, 'amount_paid' => 3.000],
    ["user_id" => 19, 'rating' => 1, 'amount_paid' => 22.000],
    ["user_id" => 22, 'rating' => 6, 'amount_paid' => 4.000],
    ["user_id" => 4, 'rating' => 6, 'amount_paid' => 20.000],
    ["user_id" => 16, 'rating' => 10, 'amount_paid' => 33.000],
    ["user_id" => 9, 'rating' => 9, 'amount_paid' => 27.000],
    ["user_id" => 1, 'rating' => 12, 'amount_paid' => 34.000],
    ["user_id" => 3, 'rating' => 8, 'amount_paid' => 50.000],
    ["user_id" => 10, 'rating' => 10, 'amount_paid' => 80.000],
    ];

    public function render()
    {
        return view('livewire.welcome');
    }
    public function implementFuzzy(){
        
        $datas = Classifier::create('user_id', $this->users, 'amount_paid', 'rating')->perform(['visitors', 'interactors', 'VIP']);
        sleep(3);
        $this->fuzzyRes=$datas;
    }
    #[On('logout')]
    public function logout() {
        Auth::logout();
        return $this->redirect('/');
    }
}
