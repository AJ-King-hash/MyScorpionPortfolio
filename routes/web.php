<?php

use App\Livewire\Packages;
use App\Livewire\Projects;
use App\Livewire\Register;
use App\Livewire\ResetPassword;
use App\Livewire\Skills;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;
use Laravel\Fortify\Features;
use Livewire\Volt\Volt;
use App\Http\Controllers\Auth\SocialiteController;
use Pest\Configuration\Project;
use Spatie\LaravelPackageTools\Package;
use App\Http\Controllers\DocsController;

Route::get('/', Welcome::class)->name('home');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Volt::route('settings/profile', 'settings.profile')->name('profile.edit');
    Volt::route('settings/password', 'settings.password')->name('user-password.edit');
    Volt::route('settings/appearance', 'settings.appearance')->name('appearance.edit');

    Volt::route('settings/two-factor', 'settings.two-factor')
        ->middleware(
            when(
                Features::canManageTwoFactorAuthentication()
                    && Features::optionEnabled(Features::twoFactorAuthentication(), 'confirmPassword'),
                ['password.confirm'],
                [],
            ),
        )
        ->name('two-factor.show');
});
Route::get("/register",Register::class)->name("register");
Route::get("/reset-password",ResetPassword::class)->name("password.request2");


Route::get('/auth/{provider}', [SocialiteController::class, 'redirect'])
    ->name('social.login');

Route::get('/auth/{provider}/callback', [SocialiteController::class, 'callback']);

Route::get("/skills",Skills::class);
Route::get("/packages",Packages::class);
Route::get("/projects",Projects::class);


Route::prefix('packages/scorpion/docs')->name('docs.')->group(function () {
    Route::get('{package_name}/{version?}/{slug?}', [DocsController::class, 'show'])->name('show')->where('slug', '.*');
});