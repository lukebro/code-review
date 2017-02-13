<?php

namespace App\Git;

use App\Git\AbstractGitResource;

class Org extends AbstractGitResource {

	/**
	 * ID of the organization.
	 * 
	 * @var int
	 */
	public $id;

	/**
	 * Name of the organization.
	 * 
	 * @var string
	 */
	public $name;
	
}
