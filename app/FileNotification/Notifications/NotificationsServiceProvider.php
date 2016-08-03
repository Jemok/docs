<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/2/16
 * Time: 11:29 AM
 */

namespace App\FileNotification\Notifications;


use Illuminate\Support\ServiceProvider;

class NotificationsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\FileNotification\Notifications\FileShared',
            'App\FileNotification\Notifications\Mailchimp\FileShared'
        );
    }

}