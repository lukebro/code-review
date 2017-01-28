<?php

namespace App\Providers;

use Auth;
use GuzzleHttp\Client;
use App\Git\Providers\GithubProvider;
use Illuminate\Support\ServiceProvider;
use App\Git\Providers\Contracts\AuthProvider;


class GitServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AuthProvider::class, function ($app) {
            return new GitHubProvider($app['redirect'], new Client, env('GITHUB_ID'), env('GITHUB_SECRET'));
        });
    }
}
