<div class="min-h-screen bg-rich-black flex items-center justify-center p-4" x-data="authForms()">
    <div class="relative w-full max-w-5xl">
        <!-- Main Container -->
        <div class="relative overflow-hidden rounded-2xl shadow-2xl bg-white">
            
            <!-- Background Gradient Overlay -->
            <div class="absolute inset-0 bg-gradient-to-br from-purple-owner via-purple-600 to-purple-owner opacity-90"></div>

            <!-- Toggle Container -->
            <div class="relative grid grid-cols-1 md:grid-cols-2 min-h-[650px]">

                <!-- Left Side - Image & Slogan (moves on toggle) -->
                <div class="absolute inset-0 md:relative flex items-center justify-center transition-all duration-1000 ease-in-out"
                     :class="!isLogin ? 'translate-x-0 md:translate-x-0' : 'translate-x-full md:translate-x-full'"
                     id="imagePanel">
                     
                    <div class="text-center text-white px-8">
                        <h2 class="text-3xl md:text-5xl font-extrabold mb-8 leading-tight">
                            Be A Scorpion <br> Developer Like Me
                        </h2>
                        <div class="flex justify-center">
                            <img src="{{ asset('storage/scorpsvgrepo1.svg') }}" 
                                 alt="Scorpion Developer"
                                 class="w-64 h-64 md:w-80 md:h-80 object-contain drop-shadow-2xl animate-pulse">
                        </div>
                    </div>
                </div>

                <!-- Right Side - Forms (Login & Register) -->
                <div class="relative flex items-center justify-center p-8 md:p-12 bg-white/95 backdrop-blur-xl">

                    <!-- Login Form -->
                    <div class="w-full max-w-md space-y-8" 
                         x-show="isLogin" 
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0 translate-x-64"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         x-transition:leave="transition ease-in duration-500"
                         x-transition:leave-start="opacity-100 translate-x-0"
                         x-transition:leave-end="opacity-0 -translate-x-64"
                         id="login">

                        <div class="text-center">
                            <h2 class="text-4xl font-bold text-purple-owner">Welcome Back!</h2>
                            <p class="mt-2 text-gray-600">Login to continue your journey</p>
                        </div>

                        <form wire:submit.prevent="submitLogin" class="space-y-6">
                            <div>
                                <input type="email" 
                                       placeholder="Email Address" 
                                       wire:model.defer="loginForm.email"
                                       class="w-full px-5 py-4 rounded-xl border border-gray-300 focus:border-purple-owner focus:ring-4 focus:ring-purple-200 outline-none transition">
                                @error('loginForm.email') 
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p> 
                                @enderror
                            </div>

                            <div>
                                <input type="password" 
                                       placeholder="Password" 
                                       wire:model.defer="loginForm.password"
                                       class="w-full px-5 py-4 rounded-xl border border-gray-300 focus:border-purple-owner focus:ring-4 focus:ring-purple-200 outline-none transition">
                                @error('loginForm.password') 
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Turnstile Widget for Login -->
                            <div>
                                {{-- <x-turnstile />
                                @error('loginForm.cf_turnstile_response')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror --}}
                            </div>

                            <button type="submit" 
                                    class="w-full py-4 bg-purple-owner hover:bg-purple-700 text-white font-bold text-lg rounded-xl shadow-lg transform hover:scale-105 transition duration-200">
                                Login Now
                            </button>
                        </form>

                        <div class="mt-8">
                            <p class="text-center text-gray-600 mb-4">Or login with</p>
                            <div class="grid grid-cols-2 gap-4">
                                <a href="{{ route('social.login', 'github') }}"
                                   class="flex items-center justify-center gap-3 bg-gray-900 text-white py-3 px-6 rounded-xl hover:bg-black transition font-medium">
                                    <img src="{{ asset('storage/gitsvg/github-octocat-svgrepo-com.svg') }}" class="w-6 h-6" alt="GitHub">
                                    <span>Continue with GitHub</span>
                                </a>

                                <a href="{{ route('social.login', 'google') }}"
                                   class="flex items-center justify-center gap-3 bg-white border-2 border-gray-300 text-gray-700 py-3 px-6 rounded-xl hover:bg-gray-50 transition font-medium shadow-sm">
                                    <img src="{{ asset('storage/gitsvg/google-icon-svgrepo-com.svg') }}" class="w-6 h-6" alt="Google">
                                    <span>Continue with Google</span>
                                </a>
                            </div>
                        </div>
                    <div class="flex justify-between">
                        <p class="text-center mt-8 text-gray-700">
                            Forget your password? 
                            <button type="button" wire:navigate href="{{ route('password.request2') }}"
                             class="text-purple-owner font-bold hover:underline">
                                Click Here
                            </button>
                        </p>
                            <p class="text-center mt-8 text-gray-700">
                                Don't have an account? 
                                <button type="button" @click="switchToRegister()" class="text-purple-owner font-bold hover:underline">
                                Register Now
                            </button>
                        </p>
                    </div>
                    </div>

                    <!-- Register Form -->
                    <div class="w-full max-w-md space-y-8" 
                         x-show="!isLogin" 
                         x-transition:enter="transition ease-out duration-700"
                         x-transition:enter-start="opacity-0 -translate-x-64"
                         x-transition:enter-end="opacity-100 translate-x-0"
                         x-transition:leave="transition ease-in duration-500"
                         x-transition:leave-start="opacity-100 translate-x-0"
                         x-transition:leave-end="opacity-0 translate-x-64"
                         id="register">

                        <div class="text-center">
                            <h2 class="text-4xl font-bold text-purple-owner">Join Us Today!</h2>
                            <p class="mt-2 text-gray-600">Create your account in seconds</p>
                        </div>

                        <form wire:submit.prevent="submitRegister" class="space-y-6">
                            <div>
                                <input type="text" 
                                       placeholder="Full Name" 
                                       wire:model.defer="signupForm.name"
                                       class="w-full px-5 py-4 rounded-xl border border-gray-300 focus:border-purple-owner focus:ring-4 focus:ring-purple-200 outline-none transition">
                                @error('signupForm.name') 
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p> 
                                @enderror
                            </div>

                            <div>
                                <input type="email" 
                                       placeholder="Email Address" 
                                       wire:model.defer="signupForm.email"
                                       class="w-full px-5 py-4 rounded-xl border border-gray-300 focus:border-purple-owner focus:ring-4 focus:ring-purple-200 outline-none transition">
                                @error('signupForm.email') 
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p> 
                                @enderror
                            </div>

                            <div>
                                <input type="password" 
                                       placeholder="Password" 
                                       wire:model.defer="signupForm.password"
                                       class="w-full px-5 py-4 rounded-xl border border-gray-300 focus:border-purple-owner focus:ring-4 focus:ring-purple-200 outline-none transition">
                                @error('signupForm.password') 
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p> 
                                @enderror
                            </div>

                            <div>
                                <input type="password" 
                                       placeholder="Confirm Password" 
                                       wire:model.defer="signupForm.password_confirmation"
                                       class="w-full px-5 py-4 rounded-xl border border-gray-300 focus:border-purple-owner focus:ring-4 focus:ring-purple-200 outline-none transition">
                                @error('signupForm.password_confirmation') 
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Turnstile Widget for Register -->
                            <div>
                                {{-- <x-turnstile />
                                @error('signupForm.cf_turnstile_response')
                                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                                @enderror --}}
                            </div>

                            <button type="submit" 
                                    class="w-full py-4 bg-purple-owner hover:bg-purple-700 text-white font-bold text-lg rounded-xl shadow-lg transform hover:scale-105 transition duration-200">
                                Create Account
                            </button>
                        </form>

                        <div class="mt-8">
                            <p class="text-center text-gray-600 mb-4">Or register with</p>
                            <div class="grid grid-cols-2 gap-4">
                                <a href="{{ route('social.login', 'github') }}"
                                   class="flex items-center justify-center gap-3 bg-gray-900 text-white py-3 px-6 rounded-xl hover:bg-black transition font-medium">
                                    <img src="{{ asset('storage/gitsvg/github-octocat-svgrepo-com.svg') }}" class="w-6 h-6" alt="GitHub">
                                    <span>Continue with GitHub</span>
                                </a>

                                <a href="{{ route('social.login', 'google') }}"
                                   class="flex items-center justify-center gap-3 bg-white border-2 border-gray-300 text-gray-700 py-3 px-6 rounded-xl hover:bg-gray-50 transition font-medium shadow-sm">
                                    <img src="{{ asset('storage/gitsvg/google-icon-svgrepo-com.svg') }}" class="w-6 h-6" alt="Google">
                                    <span>Continue with Google</span>
                                </a>
                            </div>
                        </div>

                        <p class="text-center mt-8 text-gray-700">
                            Already have an account? 
                            <button type="button" @click="switchToLogin()" class="text-purple-owner font-bold hover:underline">
                                Login Here
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Alpine.js Logic (unchanged) -->
    <script>
        function authForms() {
            return {
                isLogin: {{ request("isLogin", true) ? 'true' : 'false' }},

               switchToRegister() {
                this.isLogin = false;
                if (window.turnstile) {
                turnstile.reset('turnstile-login');  // Reset login widget
                }
                document.getElementById('imagePanel').style.transform = 'translateX(0)';
                },

                switchToLogin() {
                    this.isLogin = true;
                    document.getElementById('imagePanel').style.transform = 'translateX(100%)';
                }
            }
        }

        // Optional: Custom callbacks for Turnstile (integrates with Alpine if needed)
        function onLoginTurnstileSuccess(token) {
            // Optional: Trigger Alpine event or validation
            console.log('Login Turnstile success:', token);
        }

        function onRegisterTurnstileSuccess(token) {
            // Optional: Trigger Alpine event or validation
            console.log('Register Turnstile success:', token);
        }
    </script>
</div>