<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void {}

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('*', function ($view) {
            if (auth()->check()) {
                $notifications = auth()->user()->unreadNotifications;
            } else {
                $notifications = collect();
            }
            $notificationCout = $notifications->count();
            $view->with('notifications', $notifications);
            $view->with('notificationCount', $notificationCout);
        });
    }
}
