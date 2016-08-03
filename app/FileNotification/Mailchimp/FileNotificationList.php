<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/2/16
 * Time: 9:37 AM
 */

namespace App\FileNotification\Mailchimp;

use App\FileNotification\FileNotificationList as FileNotificationInterface;
use Mailchimp;


class FileNotificationList implements FileNotificationInterface
{

    /**
     * @var
     */
    protected $mailchimp;

    /**
     * @var array
     */
    protected $lists = [

        'fileNotificationSubscribers' => '194adfe9c8'
    ];

    /**
     * FileNotificationList constructor.
     * @param Mailchimp $mailchimp
     */
    public function __construct(Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }

    /**
     * @param $listName
     * @param $email
     * @return \associative_array
     */
    public function subscribeTo($listName, $email)
    {
        return $this->mailchimp->lists->subscribe(

            $this->lists[$listName],
            ['email' => $email],
            null, //merger vars
            'html', //email type
            'false', //require double opt in
            'true'   // update existing user

        );
    }

    /**
     * @param $listName
     * @param $email
     * @return \associative_array
     */
    public function subscribeFrom($listName, $email)
    {
        return $this->mailchimp->lists->unsubscribe(

        $this->lists[$listName],
        ['email' => $email],
        false, // delete the member permanently,
        false, // send goodbye email
        false // send unsubscribe email
    );
    }

}