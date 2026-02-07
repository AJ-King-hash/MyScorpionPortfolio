<div class="w-full max-w-5xl flex flex-col gap-8">
                <!-- Department Title -->
                <x-ali-comp.custom-title title="{{ $department->title }}" class="text-center" />

                <!-- Tabs for Skills (Horizontal Navigation) -->
                <div class="flex flex-wrap justify-center gap-4 border-b border-gray-700 pb-4">
                    @foreach ($department->skills as $skill)
                        <button 
                            wire:click="changeSkill({{$skill}})"
                            class="px-6 py-3 text-lg font-medium transition-all duration-300 rounded-t-lg
                                   {{ $curr_skill->id === $skill->id 
                                       ? 'bg-stone-400 text-black-pearl shadow-lg transform translate-y-1' 
                                       : 'bg-gray-800 hover:bg-gray-700 text-snow' }}">
                            {{ $skill->title }}
                        </button>
                    @endforeach
                </div>

                <!-- Selected Skill Detail Card -->
                <div class="bg-gray-900/50 backdrop-blur-sm rounded-2xl shadow-2xl p-8 border border-gray-800 transition-all duration-500">
                    <h1 class="text-4xl font-bold mb-4 text-snow">
                        {{ $curr_skill->title }}
                    </h1>
                    <p class="text-lg text-gray-300 mb-8 leading-relaxed">
                        {{ $curr_skill->description }}
                    </p>

                    <h3 class="text-xl font-semibold mb-4 text-snow">Categories:</h3>
                    <div class="flex flex-wrap gap-3">
                        @foreach ($curr_skill->categories as $category)
                            <span class="px-4 py-2 rounded-full bg-snow text-black-pearl text-sm font-medium shadow-md">
                                {{ $category->title }}
                            </span>
                        @endforeach
                    </div>
                </div>
</div>