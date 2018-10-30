<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\CurrencyService;

class currencies extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currencies:bootstrap';
    protected $curr;

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'show currencies and alter the rates';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(CurrencyService $curr)
    {
        parent::__construct();
        $this->curr = $curr;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $this->info('Display this on the screen');
        $currency = $this->curr->list();
        //$this->info($currency);
        
        // fetch data from currencies api
        // loop and store every record if not exist
    }
}
