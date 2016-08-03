<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 8/2/16
 * Time: 11:01 AM
 */

namespace App\FileNotification\Notifications\Mailchimp;

use App\FileNotification\Notifications\FileShared as FileSharedInterface;

use Mailchimp;


class FileShared implements FileSharedInterface
{
    const FILE_NOTIFIER_ID = '194adfe9c8';
    /**
     * @var
     */
    protected $mailchimp;

    public function __construct(Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }

    /**
     * @param $title
     * @param $body
     */
    public function notify($title, $body)
    {
        $options =  [

            'title' => [
                'list_id' => self::FILE_NOTIFIER_ID,
                'subject' => $title,
                'from_name' => 'Docs File Sender',
                'from_email' => 'mwangombe.dafton@students.jkuat.ac.ke',
                'to_name'    => 'Docs Notifier'
        ]
        ];


        $content = [
                'body' => [
                'html' => $body,
                ]
        ];


        $campaign = $this->mailchimp->campaigns->create('regular', $options['title'], $content['body']);


        $this->mailchimp->campaigns->send($campaign['id']);
    }

}