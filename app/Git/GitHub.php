<?php

namespace App\Git;

use App\Git\Api\Organization;
use App\Git\Api\Repository;
use App\User;
use Auth;
use Github\Client;

class GitHub {

	protected $client;

	protected $user;

	public function __construct(Client $client)
	{
		$this->client = $client;

		if (Auth::check()) {
			$this->withUser(Auth::user());
		}
	}

	public function withUser(User $user)
	{
		$this->user = $user;
		$this->client->authenticate($user->git_token, null, Client::AUTH_HTTP_TOKEN);

		return $this;
	}

	public function organization()
	{
		return new Organization($this->client, $this->user);
	}

	public function repository()
	{
		return new Repository($this->client, $this->user);
	}

}
