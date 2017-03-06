<?php

namespace App\Providers;

use Auth;
use GuzzleHttp\Client;
use App\Git\Providers\GithubAuthProvider;
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
            return new GitHubAuthProvider($app['redirect'], new Client, env('GITHUB_ID'), env('GITHUB_SECRET'));
        });

        // $client->authenticate(Auth::user()->git_token, null, GitHubClient::AUTH_HTTP_TOKEN);
        // $this->app->bind(GitHubClient::class, function ($pp) {
        //     $client = new GitHubClient();

        //     return
        // });
    }
}
