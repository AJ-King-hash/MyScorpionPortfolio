<div class="real-reset-password-component flex items-center justify-center min-h-screen bg-black-pearl">
    <div class="bg-gradient-to-br from-purple-owner via-purple-600 to-purple-owner backdrop-blur-sm rounded-2xl shadow-2xl p-8 border border-gray-800 transition-all duration-500 w-full max-w-md">
        <h1 class="text-3xl font-bold mb-6 text-snow text-center">
            Reset Your Password
        </h1>

        <form wire:submit.prevent="resetPass" method="POST" class="flex flex-col gap-6">
        @csrf
        @if($reset_sent==false)

            <div class="flex flex-col ">
                <h3 class="text-snow mb-2">Email Address</h3>
                <input
                class="w-full px-5 py-4 rounded-xl bg-white border border-gray-300 focus:border-purple-owner focus:ring-4 focus:ring-purple-200 outline-none transition"
                    name="email"
                    type="email"
                    placeholder="Enter your email address"
                    wire:model="email"
                />
                @error('email')
                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                @enderror
            </div>
        @endif
        @if($reset_sent==true)

            <div class="flex flex-col ">
                <h3 class="text-snow mb-2">OTP Code</h3>
                <input
                    name="otp"
                    type="text"
                     class="w-full px-5 py-4 rounded-xl bg-white border border-gray-300 focus:border-purple-owner focus:ring-4 focus:ring-purple-200 outline-none transition"
                    placeholder="Enter the OTP sent to your email"
                    wire:model="otp"
                />
            </div>

            <div class="flex flex-col">
                <h3 class="text-snow mb-2">New Password</h3>
                <input
                    name="password"
                    type="password"
                     class="w-full px-5 py-4 rounded-xl bg-white border border-gray-300 focus:border-purple-owner focus:ring-4 focus:ring-purple-200 outline-none transition"
                    placeholder="Enter your new password"
                    wire:model="password"
                />
            </div>

            <div class="flex flex-col ">
                <h3 class="text-snow mb-2">Confirm New Password</h3>
                <input
                    name="password_confirmation"
                    type="password"
                    placeholder="Confirm your new password"
                     class="w-full px-5 py-4 rounded-xl bg-white border border-gray-300 focus:border-purple-owner focus:ring-4 focus:ring-purple-200 outline-none transition"
                    wire:model="password_confirmation"
                />
            </div>

        @endif
            <div class="flex items-center justify-end">
                   <button type="submit" 
                    class="w-full py-4 bg-purple-owner text-white  hover:bg-snow hover:text-purple-owner font-bold text-lg rounded-xl shadow-lg transform hover:scale-105 transition duration-200">
                                Reset Password
                            </button>
            </div>
        </form>
    </div>

</div>
