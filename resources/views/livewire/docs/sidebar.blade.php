<div class="h-full flex flex-col docs-sidebar">
    <!-- Logo / Brand -->
    <div class="p-6 border-b border-gray-800 flex items-center gap-3">
        <img src="{{ $package->icon }}" 
             alt="Scorpfuzzy Logo" 
             class="h-20 w-20 object-contain">
        
        <div>
            <h2 class="text-2xl font-bold text-white">{{ $package_name }}</h2>
            <p class="text-sm text-gray-400 mt-1">{{ $package->name=="scorpfuzzy"?"Analytical Fuzzy Package":"Information Retrieving Package" }}</p>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="flex-1 px-3 py-4 overflow-y-auto">
        <ul class="space-y-1">
            <li>
                <a wire:navigate href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'index']) }}"
                   class="{{ $currentSlug === 'index' ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800' }} flex items-center px-4 py-2 rounded-lg transition">
                    Overview
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'installation']) }}"
                   class="{{ $currentSlug === 'installation' ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800' }} flex items-center px-4 py-2 rounded-lg transition">
                    Installation
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'usage']) }}"
                   class="{{ $currentSlug === 'usage' ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800' }} flex items-center px-4 py-2 rounded-lg transition">
                    Usage Examples
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'anfis']) }}"
                   class="{{ $currentSlug === 'anfis' ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800' }} flex items-center px-4 py-2 rounded-lg transition">
                    ANFIS / Neural
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'concepts']) }}"
                   class="{{ $currentSlug === 'concepts' ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800' }} flex items-center px-4 py-2 rounded-lg transition">
                    Core Concepts
                </a>
            </li>
            <li>
                <a wire:navigate href="{{ route('docs.show', ['package_name' => $package_name, 'version' => $version, 'slug' => 'planned']) }}"
                   class="{{ $currentSlug === 'planned' ? 'bg-gray-800 text-white' : 'text-gray-300 hover:bg-gray-800' }} flex items-center px-4 py-2 rounded-lg transition">
                    Planned Features
                </a>
            </li>

            <!-- Resources -->
            <li class="mt-6 pt-6 border-t border-gray-700">
                <span class="px-4 text-xs font-semibold uppercase text-gray-500">Resources</span>
            </li>
            <li>
                <a href="/" class="text-gray-300 hover:bg-gray-800 flex items-center px-4 py-2 rounded-lg transition">
                    My Portfolio
                </a>
            </li>
            <li>
                <a href="https://github.com/scorpion/scorpfuzzy" target="_blank"
                   class="text-gray-300 hover:bg-gray-800 flex items-center px-4 py-2 rounded-lg transition">
                    GitHub Repository
                </a>
            </li>
        </ul>
    </nav>

    <!-- Footer -->
    <div class="p-4 border-t border-gray-800 text-center text-xs text-gray-500">
        v1.0.0 • {{ now()->year }}<br>
        <span class="mt-1 block">
            by Ali Yazan Jahjah • 
            <a href="mailto:ali76723201@gmail.com?subject=Scorpfuzzy%20Inquiry" 
               class="text-indigo-400 hover:text-indigo-300 underline">
                ali76723201@gmail.com
            </a>
        </span>
        <span class="mt-1 block">© {{ now()->year }} All rights reserved.</span>
    </div>
</div>