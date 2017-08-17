<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Sainsbury;

class SainsburyCrawler extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'crawl:sainsbury';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Crawls data from Sainsbury';

    protected $crawler;

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(Sainsbury $crawler)
    {
        parent::__construct();

        $this->crawler = $crawler;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->crawler->run();
    }
}
