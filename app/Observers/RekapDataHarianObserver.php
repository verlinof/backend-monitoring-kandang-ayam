<?php

namespace App\Observers;

use App\Events\notification as EventsNotification;
use App\Models\Kandang;
use App\Models\Notification;
use App\Models\RekapDataHarian;

class RekapDataHarianObserver
{
    /**
     * Handle the RekapDataHarian "created" event.
     */
    public function created(RekapDataHarian $rekapDataHarian): void
    {
        //
        $kandang=Kandang::where('id',$rekapDataHarian->id_kandang)->first();

        if($rekapDataHarian->amoniak>20||$rekapDataHarian->suhu>20||$rekapDataHarian->kelembaban>8){
            if($rekapDataHarian->amoniak>25||$rekapDataHarian->suhu>20||$rekapDataHarian->kelembaban>8){
                Notification::create([
                    'id_kandang'=>$rekapDataHarian->id_kandang,
                    'message'=>"Bahaya lur Bahaya neng kandang ".$kandang->nama_kandang
                ]);

                $data=[
                    'id_kandang'=>$rekapDataHarian->id_kandang,
                    'message'=>"Bahaya lur Bahaya neng kandang ".$kandang->nama_kandang
                ];
                broadcast(new EventsNotification($data));
            }
            else{
                Notification::create([
                    'id_kandang'=>$rekapDataHarian->id_kandang,
                    'message'=>"Waspada Lur Waspada neng kandang ".$kandang->nama_kandang
                ]);
                $data=[
                    'id_kandang'=>$rekapDataHarian->id_kandang,
                    'message'=>"Waspada Lur Waspada neng kandang ".$kandang->nama_kandang
                ];
                broadcast(new EventsNotification($data));
            }
        }
    }

    /**
     * Handle the RekapDataHarian "updated" event.
     */
    public function updated(RekapDataHarian $rekapDataHarian): void
    {
        //
    }

    /**
     * Handle the RekapDataHarian "deleted" event.
     */
    public function deleted(RekapDataHarian $rekapDataHarian): void
    {
        //
    }

    /**
     * Handle the RekapDataHarian "restored" event.
     */
    public function restored(RekapDataHarian $rekapDataHarian): void
    {
        //
    }

    /**
     * Handle the RekapDataHarian "force deleted" event.
     */
    public function forceDeleted(RekapDataHarian $rekapDataHarian): void
    {
        //
    }
}
