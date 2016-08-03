<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/2/16
 * Time: 9:33 AM
 */

namespace App\FileNotification;


interface FileNotificationList
{
    /**
     * @param $listName
     * @param $mail
     * @return mixed
     */
    public function subscribeTo($listName, $mail);

    /**
     * @param $listName
     * @param $email
     * @return mixed
     */
    public function subscribeFrom($listName, $email);
}