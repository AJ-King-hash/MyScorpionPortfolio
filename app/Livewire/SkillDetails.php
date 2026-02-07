<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Skill;
use Livewire\Component;

class SkillDetails extends Component
{
    public Department $department;
    public $curr_skill;
    public function mount(){
        $this->curr_skill=$this->department->skills()->first();
    }
    public function changeSkill(Skill $skill){
        $this->curr_skill=$skill;
    }
    public function render()
    {
        return view('livewire.skill-details');
    }
}
