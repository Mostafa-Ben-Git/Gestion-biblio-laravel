<?php

namespace App\Providers;

use App\Events\ModelAdded;
use App\Events\ModelDeleted;
use App\Events\ModelUpdated;
use App\Listeners\RegisterModelAddition;
use App\Listeners\RegisterModelDeletion;
use App\Listeners\RegisterModelUpdation;
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
    ModelAdded::class => [
      RegisterModelAddition::class
    ],
    ModelDeleted::class => [
      RegisterModelDeletion::class
    ],
    ModelUpdated::class => [
      RegisterModelUpdation::class
    ]
  ];

  /**
   * Register any events for your application.
   */
  public function boot(): void
  {
    //
  }

  /**
   * Determine if events and listeners should be automatically discovered.
   */
  public function shouldDiscoverEvents(): bool
  {
    return false;
  }
}
