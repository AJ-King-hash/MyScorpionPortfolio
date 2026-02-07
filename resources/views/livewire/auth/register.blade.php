<div class="main" x-data="forms">
    @section('register-name')
            {{-- <x-auth.back-arrow :title="$title"/> --}}
    @endsection
    <div class="relative">
        
        <div class="content ">
            <div class="toggle-image " id="imgDiv">
                <h2>Feel Free to Share</h2>
            <img  id="partial-image" src="{{ asset('storage/images/scorpsvgrepo1.svg') }}"  alt="">
            </div>
            <div class="toggle-login toggle-register" id="login">
                    <h2>Login</h2>
                    <form action=""  wire:submit.prevent="submitLogin">
                        <input type="email" placeholder="Email" wire:model='loginForm.email'> 
                        @error('loginForm.email')
                        <p class="text-red-500">{{ $message }}</p>
                        @enderror          
                        <input type="password" placeholder="Password" wire:model='loginForm.password'>
                        @error('loginForm.password')
                            <p class="text-red-500">{{ $message }}</p>
                        @enderror          
                        <button type="submit">Submit</button>
                    </form>
                    <div class="mb-10 pt-3 ">
                        <span>Or Login Using:</span>
                        <div class="reg-buttons flex gap-x-2 justify-center items-center grow">
                            <a href="/socialite/github" class="github">
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                                  </svg>
                            </a>
                            <a href="/socialite/google" class="google" >
                                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                    <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
                                  </svg>
    
                            </a>
                        </div>
                    </div>
                    <p>Already Have An Account? <input type="submit" value="register" @click="toRegister"></p>
            </div>
        </div>
        <div class="content">
            
            <div class="toggle-register" id="register">

                <h2>Register</h2>
                <form action="" wire:submit.prevent="submitRegister">
                <input type="text" placeholder="name" wire:model="signupForm.name">
                @error('signupForm.name')
                        <p class="text-red-500">{{ $message }}</p>
                @enderror      
                <input type="email" placeholder="Email" wire:model="signupForm.email">
                @error('signupForm.email')
                        <p class="text-red-500">{{ $message }}</p>
                @enderror 
                <input type="password" placeholder="Password" wire:model="signupForm.password">
                @error('signupForm.password')
                        <p class="text-red-500">{{ $message }}</p>
                @enderror 
                <input type="password" placeholder="Password Confirmation" wire:model="signupForm.password_confirmation">
                @error('signupForm.password_confirmation')
                        <p class="text-red-500">{{ $message }}</p>
                @enderror 
                <button type="submit" >Submit</button>
                <div class="mb-10 pt-3 ">
                    <span>Or Login Using:</span>
                    <div class="reg-buttons flex gap-x-2 justify-center items-center grow">
                        <a href="/socialite/github" class="github">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                                <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27s1.36.09 2 .27c1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.01 8.01 0 0 0 16 8c0-4.42-3.58-8-8-8"/>
                              </svg>
                        </a>
                        <a href="/socialite/google" class="google" >
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                <path d="M15.545 6.558a9.4 9.4 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.7 7.7 0 0 1 5.352 2.082l-2.284 2.284A4.35 4.35 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.8 4.8 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.7 3.7 0 0 0 1.599-2.431H8v-3.08z"/>
                              </svg>

                        </a>
                    </div>
                </div>
            </form>
            <p>Already Have An Account? <input type="submit" value="login" @click="toLogin"></p>
            </div>

        </div>
    </div>
</div>