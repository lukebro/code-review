<?php

namespace App\Git\Factories;

class RepoFactory extends GitHubFactory {

	public function create(array $attributes)
	{
		$name = array_get($attributes, 'name');
		$description = array_get($attributes, 'description', '');
		$private = array_get($attributes, 'private', false);
		$org = array_get($attributes, 'org', null);

		return $this->client->api('repo')->create($name, $description, '', ! $private, $org);
	}

}
