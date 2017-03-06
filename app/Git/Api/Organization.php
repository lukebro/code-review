<?php

namespace App\Git\Api;

use App\Git\Resources\Organization as OrganizationResource;

class Organization extends AbstractGitApi {

	public function all()
	{
		return collect($this->client->api('me')->organizations())->map(function ($attributes)  {
			return $this->mapToResource($attributes);
		});
	}

	public function join($organization)
	{
		return $this->client->api('members')->add($organization, $this->user->username);
	}

	public function mapToResource(array $attributes)
	{
		return (new OrganizationResource)->setRaw($attributes)->map([
			'id' => $attributes['id'],
			'name' => $attributes['login'],
		]);
	}
}