<?php

namespace App\Git\Factories;

use Github\Client;

abstract class GitHubFactory {

	/**
	 * The GitHub Client
	 * 
	 * @var Github\Client
	 */
	protected $client;

	/**
	 * Create a new instance of a GithubRepository.
	 * 
	 * @param Client $client
	 */
	public function __construct(Client $client)
	{
		$this->client = $client;
	}

}
