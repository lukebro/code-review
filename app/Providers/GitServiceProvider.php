<?php

namespace App\Providers;

use Auth;
use GuzzleHttp\Client;
use Github\Client as GithubClient;
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

        $this->app->bind(GitHubClient::class, function ($pp) {
            $client = new GitHubClient();
            $client->authenticate(Auth::user()->git_token, null, GitHubClient::AUTH_HTTP_TOKEN);

            return $client;
        });
    }
}
