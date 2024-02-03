<?php

namespace App\Listeners;

use App\Events\ModelUpdated;
use App\Models\History;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class RegisterModelUpdation
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
  public function handle(ModelUpdated $event): void
  {
    $model = $event->model;
    History::create([
      'action' => $event->action,
      'model_type' => get_class($model),
      'model_id' => optional($model)->id,
      'user_id' => Auth::user()->id,
      // 'changes' => optional($model)->getChanges(), // Store changes made during the update
    ]);
  }
}
