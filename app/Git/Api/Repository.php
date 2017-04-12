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

    public function addCollaborator($org, $repo, User $collaborator)
    {
        return $this->client->api('repo')->collaborators()->add($org, $repo, $collaborator->username);
    }

    public function allCommits($org, $repo)
    {
        return $this->client->api('repo')->commits()->all($org, $repo, []);
    }

    public function getBranch($org, $repo, $branch = 'master')
    {
        return $this->client->api('repo')->branches($org, $repo, $branch);
    }

    public function createBranch($org, $repo, $name, $sha)
    {
        return $this->client->api('git')->references()->create($org, $repo, [
            'ref' => 'refs/heads/'.str_slug($name),
            'sha' => $sha
        ]);
    }

    public function merge($org, $repo, $base, $message, $head = 'master')
    {
        return $this->client->api('repo')->merge($org, $repo, $base, $head, $message);
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
