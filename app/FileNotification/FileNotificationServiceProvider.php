<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/2/16
 * Time: 10:26 AM
 */

namespace App\FileNotification;


use Illuminate\Support\ServiceProvider;

class FileNotificationServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            'App\FileNotification\FileNotificationList',
            'App\FileNotification\Mailchimp\FileNotificationList'
        );
    }

}