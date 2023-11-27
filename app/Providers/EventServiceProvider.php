<?php

namespace App\Providers;

use App\Events\Amoniak;
use App\Events\AmoniakProccess;
use App\Listeners\AmoniakProccessListener;
use App\Listeners\ProcessAmoniak;
use App\Models\RekapDataHarian;
use App\Observers\RekapDataHarianObserver;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        AmoniakProccess::class=>[
            AmoniakProccessListener::class,
        ],
        Amoniak::class=>[
            ProcessAmoniak::class,
        ],

    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
        RekapDataHarian::observe(RekapDataHarianObserver::class);
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return true;
    }
}
