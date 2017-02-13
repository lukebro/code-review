<?php

namespace App\Git\Repositories;

use App\Git\Org;

class OrgRepository extends GitHubRepository {

	public function getApi()
	{
		return $this->client->api('me')->organizations();
	}

	public function mapToObject(array $attributes)
	{
		return (new Org)->setRaw($attributes)->map([
			'id' => $attributes['id'],
			'name' => $attributes['login'],
		]);
	}

}
