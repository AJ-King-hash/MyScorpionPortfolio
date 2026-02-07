<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Skill;
use Livewire\Component;

class Skills extends Component
{
    public $curr_dept;
    public $curr_skill;
    public function mount(){
        $this->curr_dept=Department::first();
        $this->curr_skill=$this->curr_dept->skills()->first(); 
    }
    
    public function render()
    {
        return view('livewire.skills',[
            "departments"=>Department::all()
        ])->layout('components.layouts.landing');
    }
}
