<?php

namespace App\Git\Repositories;

use App\Git\Org;
use App\Git\Repo;

class RepoRepository extends GitHubRepository {

	protected $org;

	public static function using(Org $org)
	{
		return app(self::class)->setOrg($org);
	}

	/**
	 * Set the organization of the repo repository.
	 * 
	 * @param Org $org
	 */
	public function setOrg(Org $org) {
		$this->org = $org;

		return $this;
	}

	/**
	 * Get the Api from the client.
	 * 
	 * @return array
	 */
	public function getApi()
	{
		return $this->client->api('repos')->org($this->org->name);
	}

	public function mapToObject(array $attributes)
	{
		return (new Repo)->setRaw($attributes)->map([
			'id' => $attributes['id'],
			'name' => $attributes['name'],
			'fullName' => $attributes['full_name'],
			'private' => $attributes['private']
		]);
	}

}
