<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/2/16
 * Time: 10:58 AM
 */

namespace App\FileNotification\Notifications;


interface FileShared
{
    /**
     * @param $title
     * @param $body
     * @return mixed
     */
    public function notify($title, $body);
}