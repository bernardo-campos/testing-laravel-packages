<?php

namespace App\Providers;

use App\Models\Author;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        Author::class => 'App\Policies\AuthorPolicy',
        Book::class => 'App\Policies\BookPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('viewWebTinker', function ($user = null) {
            return optional($user)->hasRole('admin');
        });

        Gate::define('viewSentMails', function ($user = null) {
            return optional($user)->hasRole('admin');
        });
    }
}
