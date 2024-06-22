<?php

namespace App\Console\Commands;

use App\Http\Controllers\Api\GithubRepoController;
use Illuminate\Console\Command;

class StoreGithubReposCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'store:github-repos';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Store GitHub repos in the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $controller = new GithubRepoController();
        $controller->storeGithubRepos();

        $this->info('Repositories stored successfully.');
    }
}
