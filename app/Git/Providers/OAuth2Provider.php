<?php

namespace App\Git\Providers;

use App\Git\Providers\Contracts\AuthProvider;
use GuzzleHttp\ClientInterface;
use Illuminate\Routing\Redirector;
use Request;

abstract class OAuth2Provider implements AuthProvider
{
    protected $redirector;

    protected $http;

    protected $clientId;

    protected $clientSecret;

    public function __construct(Redirector $redirector, ClientInterface $http, $clientId, $clientSecret)
    {
        $this->redirector = $redirector;
        $this->http = $http;
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
    }

    abstract protected function getAccessTokenUrl();

    abstract protected function getAuthorizationUrl();

    abstract protected function getUserByToken($token);

    abstract protected function mapToUser(array $user);

    public function redirect()
    {
        return $this->redirector->to($this->getAuthorizationUrl());
    }

    public function user()
    {
        $token = $this->requestAccessToken(request('code'));

        $user = $this->getUserByToken($token);

        return $this->mapToUser($user);
    }

    protected function requestAccessToken($code)
    {
        $response = $this->http->post($this->getAccessTokenUrl(), [
            'headers' => [
                'Accept' => 'application/json'
            ],
            'form_params' => [
                'client_id' => $this->clientId,
                'client_secret' => $this->clientSecret,
                'code' => $code
            ]
        ]);

        return json_decode($response->getBody(), true)['access_token'];
    }
}
