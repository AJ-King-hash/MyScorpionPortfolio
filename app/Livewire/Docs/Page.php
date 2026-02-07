<?php

namespace App\Livewire\Docs;

use App\Models\Package;
use Livewire\Component;

class Page extends Component
{
   public string $slug;
    public string $package_name;
    public string $version;
    public Package $package;

    public function mount(string $package_name, string $version, string $slug )
    {
        $this->package_name = $package_name;
        $this->version = $version;
        $this->slug = $slug;
        $this->package=Package::where("short_name",$package_name)->first();

    }

    public function render()
    {
        return view('livewire.docs.page');
    }
}