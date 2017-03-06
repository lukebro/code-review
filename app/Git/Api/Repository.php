<?php

namespace App\Git\Api;

use App\Git\Resources\Repository as RepositoryResource;
use App\User;

class Repository extends AbstractGitApi {

    public function create(array $attributes = [])
    {
        $attributes = array_replace([
            'name' => null,
            'description' => null,
            'homepage' => '',
            'public' => true,
            'organization' => null,
            'hasIssues' => false,
            'hasWiki' => false,
            'hasDownloads' => false,
            'teamId' => null,
            'autoInit' => false,
        ], $attributes);

        return $this->mapToResource($this->client->api('repo')->create(...array_values($attributes)));
    }

    public function addCollaborator($repository, User $collaborator)
    {
        return $this->client->api('repo')->collaborators()->add($this->user->username, $repository, $collaborator->username);
    }

    public function mapToResource(array $attributes)
    {
        return (new RepositoryResource)->setRaw($attributes)->map([
            'id' => $attributes['id'],
            'name' => $attributes['name'],
            'fullName' => $attributes['full_name'],
            'private' => $attributes['private'],
        ]);
    }
}