<?php

namespace App\Listeners;

use App\Events\AmoniakProccess;
use App\Models\AmoniakSensor;
use App\Models\RekapData;
use App\Models\RekapDataHarian;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class AmoniakProccessListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //

    }

    /**
     * Handle the event.
     */

        // ... existing code

        public function handle(AmoniakProccess $event): void
        {
            $date = Carbon::now()->subSecond()->format('Y-m-d H:i:s');
            // dd($date);

            $average =(int)AmoniakSensor::where('time', $date)->avg('amoniak')??0;
            // dd($average);


            // Assuming these values are placeholders; modify accordingly
            $staticSuhu = 10;
            $staticKelembaban = 20;

            RekapDataHarian::create([
                'id_kandang' => 1,
                'amoniak' => $average,
                'suhu' => $staticSuhu,
                'kelembaban' => $staticKelembaban,
            ]);
        }
    }

