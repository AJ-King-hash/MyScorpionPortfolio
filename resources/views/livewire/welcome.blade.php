    <div x-data="{
        shown: false,
        shown2: false,
        clickedScorpion:false,
        openResult:false,
        ok:false,
    }" x-intersect="shown = true; setTimeout(() => { ok = true }, 1000)" class="container2  text-poor-white mt-10  min-h-screen">
    <div class="flex  max-lg:flex-col avataring justify-between items-center ">

    
    <div x-show="shown" 
    
    x-transition:enter="transition transform ease-in-out duration-1000"
    x-transition:enter-start="-translate-x-full opacity-0"
    x-transition:enter-end="translate-y-0 opacity-100"  {{-- Removed the leading '-' from translate-y-0 for consistency; adjust if needed --}}
    x-transition:leave="transform transition duration-1000 sm:duration-400"  {{-- Increased sm duration too for balance --}}
    x-transition:leave-start="translate-x-0 opacity-1"  {{-- Removed the leading '-' from translate-x-0 for consistency --}}
    x-transition:leave-end="-translate-x-full opacity-0"  {{-- Fixed opacity to 0 for proper fade-out --}}
    
    class="w-3/6 max-lg:w-full  h-[450px] max-lg:h-full justify-center  rounded-full overflow-hidden relative   max-lg:mb-0 flex max-lg:flex-col items-center  ">
    
    <img src="{{ asset('storage/me.jpg') }}" alt="" class="shadow shadow-black-pearl transition-all duration-100 hover:shadow-md object-cover absolute max-lg:relative max-lg:w-[350px] max-lg:rounded-full aspect-square  w-2/3  items-center mx-auto left-0">
    <div class="flex flex-col relative auth-buttons max-lg:hidden  max-lg:w-0 w-1/3 ml-auto mr-10 -translate-x-12">
       @auth
       <a  href="javascript:void(0)" @click="$dispatch('logout')"  class=" text-rich-black cursor-pointer px-2 py-1 rounded bg-snow/50 hover:bg-snow">Logout</a>
        
       <a  href="javascript:void(0)" class=" text-rich-black cursor-pointer px-2 py-1 rounded bg-snow/50 hover:bg-snow">{{ auth()->user()->name }}</a>
       @endauth
       @guest
       <a  href="{{ route('register',["isLogin"=>false]) }}"  class=" text-rich-black cursor-pointer px-2 py-1 rounded bg-snow/50 hover:bg-snow font-bold">Register</a>
       <a  href="{{ route('register',["isLogin"=>true])}}"  class=" text-rich-black cursor-pointer px-2 py-1 rounded bg-snow/50 hover:bg-snow font-bold">Login</a>
       @endguest
    </div>
    <div class="relative flex space-x-2 transition-all duration-100  min w-full  min-lg:hidden min-xl:hidden justify-around items-center mt-3">
       <a href="{{ route('register',["isLogin"=>false]) }}"    class=" transition-all duration-100  text-rich-black cursor-pointer px-2 py-1 font-bold rounded text-right w-[50%] bg-snow/50 hover:bg-snow">Register</a>
        <a href="{{ route('register',["isLogin"=>true])}}" class=" font-bold transition-all duration-100  text-rich-black text-left cursor-pointer px-2 py-1 rounded  w-[50%] bg-snow/50 hover:bg-snow">Login</a> 
    </div>
</div>

    <div  class="w-3/6 max-lg:text-center max-lg:w-full mt-10 ml-2 left-0 main-details">
        <x-ali-comp.full-name>MY NAME IS ALI JAHJAH AND I AM:</x-ali-comp.full-name>
        <x-ali-comp.typing-cursor/>
        <br>
        <x-ali-comp.full-desc>My Portfolio Shows My Passion In Developing AI Tools For PHP Programming And Also What Is The Results Of My Four Years Of Experience.</x-ali-comp.full-desc>
        <br>
        <x-ali-comp.full-desc1>I Have The Most Experience With Data Analysis,Therefore,I Made My Own PHP Composer Package For Data Analysis.</x-ali-comp.full-desc1>
        
    </div>
    </div>
<div class="mt-7" x-intersect.full="shown2 = true">
    <h1 class="w-full text-center text-5xl font-font-bold flex items-center justify-center gap-4 scorpImg"
        x-show="shown2"
        x-transition:enter="transition ease-out duration-700"
        x-transition:enter-start="opacity-0 scale-75 -translate-y-10"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0">
        I'm A Scorpion Developer
        <div class="relative">
            <span class="absolute bouncing-red -top-8 -left-0  text-white text-xs font-bold px-3 py-1 rounded-full animate-bounce">
                <span>Click Me!</span>
            </span>
            <img 
                class="w-28 h-28 animate-pulse hover:animate-none cursor-pointer transition-all duration-300 hover:scale-110"
                @click="clickedScorpion = !clickedScorpion; 
                        setTimeout(() => document.getElementById('scorpionDetails').scrollIntoView({ behavior: 'smooth' }), 150)"
                src="{{ asset('storage/scorpsvgrepo1.svg') }}" 
                alt="Scorpion">
        </div>
    </h1>

    <p x-show="shown2" 
       class="text-center text-lg mt-4 max-w-3xl mx-auto"
       x-transition:enter="transition ease-out duration-800 delay-300"
       x-transition:enter-start="opacity-0 translate-y-8"
       x-transition:enter-end="opacity-100 translate-y-0">
        I specialize in creating innovative solutions using PHP and AI technologies.
    </p>
</div>

<!-- Scorpion Fuzzy Classifier Demo Section -->
<div x-show="clickedScorpion" 
     x-transition:enter="transition ease-out duration-500"
     x-transition:enter-start="opacity-0 scale-95"
     x-transition:enter-end="opacity-100 scale-100"
     class="mt-12 bg-gradient-to-b from-shadow-black/80 to-black-pearl/90 rounded-3xl shadow-2xl overflow-hidden border border-gray-800">
    
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-0">
        <!-- Left: Input Data & Trigger -->
        <div class="p-8 flex flex-col justify-between bg-black-pearl/70 backdrop-blur-sm">
            <div>
                <h2 class="text-3xl font-bold text-center mb-6">Scorpion Fuzzy Classifier</h2>
                <p class="text-center mb-8 leading-relaxed">
                    Oops! We have unclassified users and don't know who deserves special offers.<br>
                    Let's use <strong>ScorpionPackage</strong> to intelligently classify them using fuzzy logic.
                </p>

                <div class="overflow-hidden rounded-xl shadow-lg border border-gray-700">
                    <table class="w-full text-center table-for-scorp text-black-pearl">
                        <thead class="bg-white font-bold text-lg">
                            <tr>
                                <th class="py-3">ID</th>
                                <th class="py-3">Rating</th>
                                <th class="py-3">Amount Paid</th>
                            </tr>
                        </thead>
                        <tbody class="bg-snow/40 divide-y divide-gray-600">
                            @foreach ($users as $user)
                            <tr class="hover:bg-snow/60 transition-colors duration-200">
                                <td class="py-3">{{ $user['user_id'] }}</td>
                                <td class="py-3">{{ $user['rating'] }}</td>
                                <td class="py-3 font-semibold">${{ $user['amount_paid'] }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="text-center mt-8">
                <button 
                    @click="openResult = true" 
                    wire:click="implementFuzzy"
                    class="px-8 py-4 rounded-xl bg-snow/80 hover:bg-snow text-black-pearl font-bold text-xl shadow-lg transition-all duration-300 transform hover:scale-105 disabled:opacity-60 cursor-pointer disabled:cursor-not-allowed disabled:transform-none"
                    :disabled="openResult">
                    Classify Users
                </button>
            </div>
        </div>

        <!-- Right: Results + Loader -->
        <div x-show="openResult" 
             x-transition:enter="transition ease-out duration-600"
             x-transition:enter-start="opacity-0 translate-x-10"
             x-transition:enter-end="opacity-100 translate-x-0"
             class="p-8 bg-gradient-to-b from-black-pearl/50  to-shadow-black/90 flex flex-col min-h-[500px] relative">
            
            <!-- Custom Loader - Only shows during Livewire request -->
           

            <!-- Results Content -->
            <div class="flex-1 flex flex-col justify-center space-y-10">
                <div x-cloak wire:loading.delay.remove>
                    @if ($fuzzyRes)
                        <x-ali-comp.custom-title title="Results:" class="text-center mb-8" />

                        <div class="space-y-12">
                            @foreach (array_keys($fuzzyRes) as $fuzzy_key)
                                <div class="text-center">
                                    <h3 class="text-2xl font-bold mb-6 underline decoration-2 underline-offset-8">
                                        {{ ucfirst($fuzzy_key) }}
                                    </h3>
                                    <div class="flex flex-wrap justify-center gap-5">
                                        @foreach (array_keys($fuzzyRes[$fuzzy_key]) as $user_id)
                                            <div class="group relative">
                                                <div class="w-16 h-16 rounded-full bg-snow text-black-pearl flex items-center justify-center text-xl font-bold shadow-xl transition-all duration-300 group-hover:scale-125 group-hover:shadow-2xl border-4 border-black-pearl">
                                                    {{ $user_id }}
                                                </div>
                                                <span class="absolute -bottom-8 left-1/2 -translate-x-1/2 text-xs opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                                    User {{ $user_id }}
                                                </span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach
                        </div>

                        <div class="mt-12 text-center">
                            <p wire:navigate href="/packages/scorpion/docs/scorpfuzzy/v1.0.0/index" class="inline-flex cursor-pointer hover:underline items-center gap-3 text-lg font-medium">
                                See more details about Scorpion Fuzzy Classifier 
                                <flux:icon name="chevron-double-right" class="w-6 h-6" />
                            </p>
                        </div>
                    @endif
                </div>
            </div>
             
        </div>
        <div wire:loading.delay wire:target="implementFuzzy" 
                 class="absolute  top-[75%] left-[73%] -trnaslate-x-[50%] -translate-y-[50%]">
                 <x-custom-loader class="" />
                </div>
    </div>

    <div id="scorpionDetails"></div>
</div>

<style>
    [x-cloak] { display: none !important; }
</style>
    </div>