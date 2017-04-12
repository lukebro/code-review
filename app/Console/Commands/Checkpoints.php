<?php

namespace App\Console\Commands;

use App\Checkpoint;
use App\Jobs\SubmitCheckpoint;
use Illuminate\Console\Command;

class Checkpoints extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'checkpoints';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch the jobs to process the checkpoints.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $checkpoints = Checkpoint::due()->get();

        $checkpoints->each(function ($checkpoint) {
            dispatch(new SubmitCheckpoint($checkpoint));
        });

        $this->info("Dispatched {$checkpoints->count()} checkpoints.");
    }
}
