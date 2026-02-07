<div class="group relative bg-gradient-to-br from-gray-900/70 to-black/80 backdrop-blur-md rounded-3xl shadow-2xl shadow-black/40 p-8 border border-gray-700/50 hover:border-scorpion-green/40 transition-all duration-500 hover:shadow-scorpion-glow overflow-hidden w-full max-w-3xl mx-auto">

    <!-- Subtle background accent -->
    <div class="absolute inset-0 opacity-0 group-hover:opacity-20 transition-opacity duration-700 pointer-events-none">
        <div class="absolute -top-20 -right-20 w-64 h-64 bg-scorpion-green/10 rounded-full blur-3xl"></div>
    </div>

    <div class="relative z-10 flex flex-col md:flex-row md:items-start gap-6">
        <!-- Icon with hover effect -->
        <div class="flex-shrink-0">
            <div class="relative">
                <div class="absolute inset-0 bg-scorpion-green/20 rounded-full blur-xl opacity-0 group-hover:opacity-70 transition-opacity duration-500"></div>
                <img 
                    class="w-20 h-20 object-contain transition-transform duration-500 group-hover:scale-110 group-hover:rotate-6" 
                    src="{{ $package->icon }}" 
                    alt="{{ $package->name }} icon"
                />
            </div>
        </div>

        <!-- Content -->
        <div class="flex-1">
            <h2 class="text-3xl md:text-4xl font-bold mb-4 text-snow tracking-tight group-hover:text-scorpion-green transition-colors duration-300">
                {{ $package->name }}
            </h2>

            <p class="text-lg text-gray-300/90 mb-8 leading-relaxed">
                {{ $package->meta_description }}
            </p>

            <div class="flex flex-wrap items-center gap-4">
                @if ($package->available)
                <span class="px-4 py-2 rounded-full cursor-default  bg-snow text-black-pearl text-sm font-bold shadow-md shadow-purple-400">
                    {{ $package->command }}
                </span>
                    
                <a href="{{ $package->doc_path }}" 
                    class="text-scorpion-green hover:text-scorpion-green-light font-medium flex items-center gap-2 transition-colors duration-300">
                    See the full doc
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
                @else
                 <span class="px-5 py-2.5 cursor-default rounded-full bg-scorpion-green/20 text-scorpion-green font-medium text-sm border border-scorpion-green/30 shadow-sm transition-all duration-300 hover:bg-scorpion-green/30 hover:shadow-scorpion-glow/50
                 ">
                    Coming Soon (completed 90%)            
                </span>
                @endif
            </div>
        </div>
    </div>
</div>