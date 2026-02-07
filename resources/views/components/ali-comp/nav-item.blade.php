@props(['icon'=>null,"current"=>null,"href"=>"#"])
<li class="p-0 m-0 w-full ">
    <a href="{{ $href }}" wire:navigate  wire:current="{{ $current }}" {{ $attributes->merge(["class"=>"hover:bg-snow/50 transition-all duration-100 flex items-center space-x-2 py-1 px-5 m-3 max-md:py-1 max-md:px-3 max-md:my-1 text-center  rounded flex justify-center   "]) }}  >
    @if ($icon)
    <flux:icon  :name="$icon" /> 
        
    @else
        <img src="{{ asset("storage/scorpsvgrepo2.svg") }}" class="w-5 h-5" alt=""/>
    @endif
    <span>{{ $slot }}  </span>
</a>
        </li>
