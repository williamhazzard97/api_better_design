<?php

namespace App\Console\Commands;

use App\Models\Item;
use Illuminate\Console\Command;

class priceSum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'priceSum:show';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo Item::sum('price');
    }
}
