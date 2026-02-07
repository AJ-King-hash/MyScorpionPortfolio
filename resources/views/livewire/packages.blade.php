<div class="text-snow container mx-auto my-4 min-h-screen">
 
    <x-ali-comp.custom-title title="My Packages" />
    <div class="flex flex-col items-center justify-center gap-12 mt-10">
        @foreach ($packages as $package)
                <livewire:package-details :key="$package->id" :package="$package"/>
        @endforeach
    </div>
</div>
