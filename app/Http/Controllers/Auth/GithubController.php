<?php

namespace App\Http\Controllers\Auth;

use App\Git\Providers\Contracts\AuthProvider;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\User;
use Auth;
use Illuminate\Http\Request;

class GithubController extends Controller
{

	/**
	 * Authentication provider for Git.
	 *
	 * @var AuthProvider
	 */
	protected $provider;

	/**
	 * Create a new instance of the controller.
	 *
	 * @param AuthProvider $provider
	 */
	public function __construct(AuthProvider $provider)
	{
		$this->provider = $provider;

		$this->middleware('guest', ['except' => 'logout']);
	}

	/**
	 * Redirect to provider for OAuth.
	 *
	 * @return redirect
	 */
	public function redirectToProvider()
	{
		return $this->provider->redirect();
	}

	/**
	 * Handle the callback from provider.
	 *
	 * @return redirect
	 */
	public function handleProviderCallback()
	{
		$user = $this->provider->user();

	    Auth::login($this->findOrCreateUser($user), true);

		return redirect('classrooms');
	}

	/**
	 * Logout the current logged in user.
	 *
	 * @return redirect
	 */
	public function logout()
	{
		Auth::logout();

		return redirect('/');
	}

	/**
	 * Find or create a user with a specifica GitHub token.
	 * @param  [type] $user [description]
	 * @return [type]       [description]
	 */
	protected function findOrCreateUser($user)
	{
		$existing = User::where('username', $user->username)->first();

		if($existing) {
			return $existing;
		}

		$user->save();

		return $user;
	}


}
