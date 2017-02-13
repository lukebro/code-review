<?php

namespace App\Git;

use App\Git\AbstractGitResource;

class Repo extends AbstractGitResource {

	/**
	 * ID of the repo.
	 * 
	 * @var int
	 */
	public $id;

	/**
	 * Name of the repo.
	 * 
	 * @var string
	 */
	public $name;

	/**
	 * Full name of repo.
	 * 
	 * @var string
	 */
	public $fullName;

	/**
	 * Determines if the repo is private.
	 * 
	 * @var boolean
	 */
	public $private;


}
