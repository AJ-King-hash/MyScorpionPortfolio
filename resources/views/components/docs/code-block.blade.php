<div class="relative group not-prose my-8">
    <div class="absolute top-3 right-3 z-10 opacity-0 group-hover:opacity-100 transition-opacity">
        <button 
            class="copy-button flex items-center gap-1.5 rounded bg-slate-800 px-3 py-1.5 text-xs font-medium text-slate-300 hover:bg-slate-700 shadow-sm transition"
            data-clipboard-text="{{ $slot }}">
            <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z" />
            </svg>
            Copy
        </button>
    </div>
    <pre class="bg-slate-950 rounded-xl p-6 overflow-x-auto text-sm leading-6 shadow-lg ring-1 ring-slate-800">
        <code class="language-{{ $language ?? 'text' }}">{{ $slot }}</code>
    </pre>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.copy-button').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();

                // Find the nearest code block and copy its plain text
                const container = this.closest('.relative');
                const codeEl = container && container.querySelector('pre code');
                if (!codeEl) return;

                const textToCopy = codeEl.textContent.trim();

                const originalHTML = this.innerHTML;
                navigator.clipboard.writeText(textToCopy).then(() => {
                    this.innerHTML = '<span class="text-green-400">Copied!</span>';
                    setTimeout(() => this.innerHTML = originalHTML, 2000);
                }).catch(err => {
                    console.error('Failed to copy:', err);
                    this.innerHTML = '<span class="text-red-400">Failed</span>';
                    setTimeout(() => this.innerHTML = originalHTML, 2000);
                });
            });
        });
    });
    </script>
</div>