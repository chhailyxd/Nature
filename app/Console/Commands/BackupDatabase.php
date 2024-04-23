<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class BackupDatabase extends Command
{
    protected $signature = 'backup:data';
    protected $description = "Backup the application data";

    public function handle(){
        BackupJobFactory::createFromArray(config('backup'))->run();
        $this->info('Backup completed successfully.');
    }
}
