<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Http\ViewComposers\LayoutComposer;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
      View::composer(
        ['task.index','task.edit'],
        'App\Http\ViewComposers\LayoutComposer'
      );

      // View::composers([
      //   LayoutComposer::class => 'task.index',
      //   LayoutComposer::class => 'task.edit',
      // ]);

    }
}
