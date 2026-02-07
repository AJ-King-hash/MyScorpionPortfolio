<!DOCTYPE html>
<html lang="en" data-theme="light" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Scorpfuzzy Documentation' }}</title>
    <link rel="icon" type="image/x-icon" href="{{ asset("storage/scorpsvgrepo1.svg") }}">
    <!-- Prism CSS (use okaidia theme – looks great on dark/light backgrounds) -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css" integrity="sha512-... " crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- Prism JS core + common languages -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/prism.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-php.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-bash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-markup.min.js"></script>
    @vite(['resources/css/docs.css', 'resources/js/app.js'])
    @livewireStyles()
</head>
<body class="antialiased bg-gray-50">
    @fluxScripts
<div class="flex h-screen overflow-hidden">
    <!-- Sidebar -->
    <aside class="w-72 bg-gray-900 text-gray-100 flex-shrink-0 border-r border-gray-800">
      <livewire:docs.sidebar 
        package_name="{{ $package_name }}" 
        :version="$version" 
        :currentSlug="$slug ?? 'index'" 
    />
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden">
        <!-- Header -->
        <header class="bg-white shadow-sm border-b border-gray-200 px-6 py-4 flex items-center justify-between">
            <h1 class="text-xl font-semibold text-gray-800">{{ $title ?? 'Documentation' }}</h1>
            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-500">v1.0.0</span>
            </div>
        </header>

        <!-- Content -->
        <main class="flex-1 overflow-y-auto p-6 lg:p-10 bg-white">
            <livewire:docs.page 
            :slug="$slug ?? 'index'" 
            package_name="{{ $package_name }}" 
            :version="$version" 
            />
        </main>
    </div>
</div>

</body>
@livewireScripts()
<script>
    document.addEventListener('DOMContentLoaded', () => {
        Prism.highlightAll();
    });
</script>
<style>
    /* Custom scrollbar for sidebar */
.docs-sidebar {
    scrollbar-width: thin; /* Firefox */
    scrollbar-color: #6b7280 #1f2937; /* thumb / track */
}

/* Webkit browsers (Chrome, Safari, Edge) */
.docs-sidebar::-webkit-scrollbar {
    width: 8px; /* thinner scrollbar */
}

.docs-sidebar::-webkit-scrollbar-track {
    background: #1f2937; /* same as sidebar bg (gray-900) */
    border-left: 1px solid #374151; /* subtle separator */
}

.docs-sidebar::-webkit-scrollbar-thumb {
    background: #6b7280; /* gray-500 */
    border-radius: 4px;
    border: 2px solid #1f2937; /* subtle padding */
}

.docs-sidebar::-webkit-scrollbar-thumb:hover {
    background: #9ca3af; /* gray-400 on hover */
}

/* Optional: make it even darker/more subtle */
.docs-sidebar::-webkit-scrollbar-corner {
    background: #1f2937;
}
</style>
</html>