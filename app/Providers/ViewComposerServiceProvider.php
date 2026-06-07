<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        View::composer('*', function($view) {
            $notifications = auth()->user()->unreadNotifications;
            $notificationCout = $notifications->count();
            $view->with('notifications',$notifications);
            $view->with('notificationCount', $notificationCout);
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
