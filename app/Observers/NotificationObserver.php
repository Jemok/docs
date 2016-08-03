<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/2/16
 * Time: 2:21 PM
 */

namespace App\Observers;





use App\FileNotification\Notifications\Mailchimp\FileShared;
use Illuminate\Support\Facades\View;


class NotificationObserver
{


    /**
     * @param $model
     * @param FileShared $fileShared
     */
    public function saved($model){

        $this->work($model, new FileShared(new \Mailchimp()) );
    }


    /**
     * @param $model
     * @param $fileShared
     */
    public function work($model, FileShared $fileShared){

        $body = View::make('email.file_shared', compact('model'))->render();

        //$fileShared->notify($model->file()->first()->file_name, $body);

    }
}