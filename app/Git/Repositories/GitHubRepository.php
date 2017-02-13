<?php

namespace App\Git\Repositories;

use Github\Client;

abstract class GitHubRepository {

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
	public function __construct(Client $client) {
		$this->client = $client;
	}

	/**
	 * Map the attribtues from the Api to an actual object.
	 * 
	 * @param  array  $attribtues
	 * @return object
	 */
	abstract protected function mapToObject(array $attribtues);

	/**
	 * Get the default Api response for resource.
	 * 
	 * @return array
	 */
	abstract protected function getApi();

	/**
	 * Using the Api response return all the resources in their respective objects.
	 * 
	 * @return Collection
	 */
	public function all() {
		return collect($this->getApi())->map(function ($attributes)  {
			return $this->mapToObject($attributes);
		});
	}


}
