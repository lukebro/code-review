<?php

namespace App\Git\Api;

use App\User;
use Github\Client;

abstract class AbstractGitApi {

	protected $client;

    protected $user;

	public function __construct(Client $client, User $user)
	{
		$this->client = $client;
        $this->user = $user;
	}

	abstract protected function mapToResource(array $attributes);

}