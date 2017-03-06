<?php

namespace App\Git\Api;

use App\Git\Resources\Organization as OrganizationResource;
use App\User;

class Organization extends AbstractGitApi {

	public function all()
	{
		return collect($this->client->api('me')->organizations())->map(function ($attributes)  {
			return $this->mapToResource($attributes);
		});
	}

	public function join($organization, User $joinee)
	{
		return $this->client->api('members')->add($organization, $joinee->username);
	}

	public function mapToResource(array $attributes)
	{
		return (new OrganizationResource)->setRaw($attributes)->map([
			'id' => $attributes['id'],
			'name' => $attributes['login'],
		]);
	}
}