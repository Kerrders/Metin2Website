<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class FlushCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'flush:cache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Flush the model cache';

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
        $models = [
            'App\Models\Player',
            'App\Models\PlayerIndex',
            'App\Models\Guild',
            'App\Models\GuildMember'
        ];

        foreach ($models as $model) {
            $this->info('Cache flushed for '. $model);
            $model = new $model();
            $model->flushCache();
        }
        return 1;
    }
}
