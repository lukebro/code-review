<?php

namespace App\Jobs;

use App\Checkpoint;
use App\Git\GitHub;
use App\Submission;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SubmitCheckpoint implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $checkpoint;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Checkpoint $checkpoint)
    {
        $this->checkpoint = $checkpoint;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(GitHub $github)
    {
        $this->checkpoint->due = true;
        $this->checkpoint->save();

        $assignment = $this->checkpoint->assignment;
        $classroom = $assignment->classroom;
        $teams = $assignment->teams;

        $github->withUser($classroom->user);

        foreach ($teams as $team) {
            $commits = $github->repository()->allCommits($classroom->org, $team->repo);

            $submissions = $team->submissions;

            if ($submissions->count()) {
                $sha = $submissions->last()->sha;
            } else {
                $sha = end($commits)['sha'];
            }

            $github->repository()->createBranch($classroom->org, $team->repo, $this->checkpoint->slug, $sha);
            $github->repository()->merge($classroom->org, $team->repo, $this->checkpoint->slug, 'Submission created by CR.');

            Submission::create([
                'team_id' => $team->id,
                'checkpoint_id' => $this->checkpoint->id,
                'sha' => $sha,
            ]);
        }

    }
}
