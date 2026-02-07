<?php

namespace App\Livewire;

use App\Models\Package;
use Livewire\Component;

class PackageDetails extends Component
{
    public Package $package;
    public function render()
    {
        return view('livewire.package-details');
    }
}
