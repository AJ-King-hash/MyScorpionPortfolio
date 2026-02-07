<?php

namespace App\Providers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        URL::forceScheme('https');
        Relation::enforceMorphMap([
            'user' => 'App\Models\User',
            "skill"=>"App\Models\Skill",
            "project"=>"App\Models\Project",
            "package"=>"App\Models\Package",
            "like"=>"App\Models\Like"
        ]);
    }
}
