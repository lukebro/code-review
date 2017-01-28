<?php

namespace App\Git\Providers;

use App\Git\Providers\Contracts\AuthProvider;
use App\User;

class GithubProvider extends OAuth2Provider
{

	protected function getAuthorizationUrl()
	{
		$url = 'https://github.com/login/oauth/authorize?';

		return $url . http_build_query([
			'client_id' => $this->clientId,
			'scope' => 'user:email,repo,admin:repo_hook'
		]);
	}

	protected function getAccessTokenUrl()
	{
		return 'https://github.com/login/oauth/access_token';
	}

	protected function getUserByToken($token)
	{
		$response = $this->http->get('https://api.github.com/user', [
			'headers' => [
				'Authorization' => 'token ' . $token,
			]
		]);

		return json_decode($response->getBody(), true) + ['token' => $token];
	}

	protected function mapToUser(array $user)
	{
		return new User([
				'username' => $user['login'],
				'name' => $user['name'],
				'email' => $user['email'],
				'github_login' => $user['login'],
				'github_token' => $user['token'],
				'avatar_url' => $user['avatar_url'],
		]);
	}
}
