<div class="bg-gradient-to-tr from-[var(--primary-color)]  to-purple-400 shadow-sm shadow- shadow-poor-white rounded-b-xl border-b border-l border-r border-black-pearl sticky ">
    <div class="container2 " x-data="{expanded:false}" x-show="expanded" x-collapse.min.55px x-cloak>
        <div  class="nav-items flex items-center justify-between mb-2"> 
          <a href="/" class="hover:text-rich-black hover:ring-rich-black transition-all duration-300 font-bold text-stone-200 ring-stone-300 ring-1 shadow  ring-offset-stone-200 p-1 ring-offset-2 m-2">
            Ali JH
          </a> 
          <style>
            [x-cloak]{
              min-height: 60px;
            }
          </style>
          <button @click="expanded=!expanded" x-bind:class="{'bg-snow/50':expanded}" type="button" class="cursor-pointer rounded hover:bg-snow/50 transition-all duration-100 py-1 px-2 m-3 min-md:hidden"><flux:icon name="bars-3"/></button>

          <ul class="flex max-md:flex-col  max-md:hidden" >
            {{-- <x-ali-comp.typing-cursor/> --}}
            <x-ali-comp.nav-item icon="bolt" href="/skills" current="bg-snow/50" >Skills</x-ali-comp.nav-item>
            <x-ali-comp.nav-item  href="/packages" current="bg-snow/50">Packages</x-ali-comp.nav-item>
            <x-ali-comp.nav-item  href="/projects" icon="circle-stack" current="bg-snow/50">Projects</x-ali-comp.nav-item>
          </ul>
        </div>
        <ul class="flex max-md:flex-col min-lg:hidden min-xl:hidden items-center w-full text-center pb-2">
            {{-- <x-ali-comp.typing-cursor/> --}}
            <x-ali-comp.nav-item class="w-full" icon="bolt" href="/skills"  current="bg-snow/50">Skills</x-ali-comp.nav-item>
            <x-ali-comp.nav-item class="w-full" href="/packages" current="bg-snow/50">Packages</x-ali-comp.nav-item>
            <x-ali-comp.nav-item class="w-full" href="/projects" current="bg-snow/50" icon="circle-stack">Projects</x-ali-comp.nav-item>
          </ul>
    </div>
</div>


{{-- 
            <span x-data="{ texts: ['Hello World', 'Welcome Back', 'Laravel Rocks'] }" x-typewriter="texts" x-typewriter.cursor="texts" ></span>

--}}