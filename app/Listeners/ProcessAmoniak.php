<?php

namespace App\Listeners;

use App\Events\Amoniak;
use App\Models\AmoniakSensor;
use App\Models\RekapDataHarian;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class ProcessAmoniak
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
    public function handle(Amoniak $event): void
    {
        //
        $date = Carbon::now()->subSecond()->format('Y-m-d H:i:s');
        // dd($date);

        $average =(int)AmoniakSensor::where('time', $date)->avg('amoniak')??0;
        // dd($average);


        // Assuming these values are placeholders; modify accordingly
        $staticSuhu = 10;
        $staticKelembaban = 5;

        RekapDataHarian::create([
            'id_kandang' => 1,
            'amoniak' => $average,
            'suhu' => $staticSuhu,
            'kelembaban' => $staticKelembaban,
        ]);
    }
}
