<?php

namespace App\Git\Factories;

class OrgFactory extends GitHubFactory {

	public function join($org, $username)
	{
		return $this->client->api('members')->add($org, $username);
	}

}
