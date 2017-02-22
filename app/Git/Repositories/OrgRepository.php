<?php

namespace App\Git\Repositories;

use Auth;
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

	public function new()
	{
		return $this->all()->filter(function ($org) {
			return Auth::user()->role->classrooms()->where('name', $org->name)->first() == null;
		});
	}

}
