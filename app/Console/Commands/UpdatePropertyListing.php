<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Api\PropertyApiController;

class UpdatePropertyListing extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'property:update-property-listing';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch property listing from external data source and update the local database';

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
     * @return int
     */
    public function handle()
    {
        return (new PropertyApiController())->fetchPropertyListing();
    }
}
