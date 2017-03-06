<?php

namespace App\Git\Factories;

class RepoFactory extends GitHubFactory {

	public function create(array $attributes)
	{
		return $this->client->api('repo')->create(
            array_get($attributes, 'name'),
            array_get($attributes, 'description', ''),
            '',
            ! array_get($attributes, 'private', false),
            array_get($attributes, 'organization', null)
        );
	}

}
