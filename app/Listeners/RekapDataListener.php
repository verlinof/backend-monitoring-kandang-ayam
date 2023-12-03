<?php

namespace App\Listeners;

use App\Events\RekapData;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RekapDataListener
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
    public function handle(RekapData $event): void
    {
        //
        $today=today();


    }
}
