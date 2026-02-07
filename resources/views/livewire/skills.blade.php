<div class="text-snow container mx-auto my-4 min-h-screen">
    <x-ali-comp.custom-title title="My Skills" />

    <div class="flex flex-col items-center justify-center gap-12 mt-10">
        @foreach ($departments as $department)
            <livewire:skill-details :key="$department->id" :department="$department"/>
        @endforeach
    </div>
</div>