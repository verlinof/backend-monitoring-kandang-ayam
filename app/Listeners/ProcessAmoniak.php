<?php

namespace App\Listeners;

use App\Events\Amoniak;
use App\Models\AmoniakSensor;
use App\Models\RekapDataHarian;
use App\Models\SuhuKelembabanSensor;
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
        $amo=AmoniakSensor::all();
        $countAmo=count($amo);
        // dd($countAmo);
        $SS=SuhuKelembabanSensor::all();
        $countSS=count($SS);

        if($countAmo>=500){
            AmoniakSensor::truncate();
        }

        if($countSS>=500){
            SuhuKelembabanSensor::truncate();
        }
        $averageAmoniak =(int)AmoniakSensor::where('time', $date)->avg('amoniak')??0;
        $averageSuhu =(int)SuhuKelembabanSensor::where('time', $date)->avg('suhu')??0;
        $averageKelembaban =(int)SuhuKelembabanSensor::where('time', $date)->avg('kelembaban')??0;

        // dd($average);


        // Assuming these values are placeholders; modify accordingly
        RekapDataHarian::create([
            'id_kandang' => 1,
            'amoniak' => $averageAmoniak,
            'suhu' => $averageSuhu,
            'kelembaban' => $averageKelembaban,
        ]);
    }
}
