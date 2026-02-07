<?php

namespace App\Livewire\Docs;

use App\Models\Package;
use Livewire\Component;

class Sidebar extends Component
{
    public string $currentSlug;
    public string $package_name;
    public string $version;
    public Package $package;

    public function mount(string $package_name, string $version, string $currentSlug = 'index')
    {
        $this->package_name = $package_name;
        $this->version = $version;
        $this->currentSlug = $currentSlug;
        $this->package=Package::where("short_name",$package_name)->first();
    }

    public function render()
    {
        return view('livewire.docs.sidebar');
    }
}