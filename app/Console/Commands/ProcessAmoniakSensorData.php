<?php

namespace App\Console\Commands;

use App\Models\AmoniakSensor;
use App\Models\RekapData;
use App\Models\RekapDataHarian;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ProcessAmoniakSensorData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:process-amoniak-sensor-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
    }
        
}
