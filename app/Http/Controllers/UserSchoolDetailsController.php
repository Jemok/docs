<?php

namespace App\Http\Controllers;

use App\FileNotification\FileNotificationList;
use App\Repositories\UserSchoolDetailsRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateUserSchoolDetailsRequest;

class UserSchoolDetailsController extends Controller
{

    /**
     * @var
     */
    private $fileNotificationList;

    /**
     * UserSchoolDetailsController constructor.
     * @param FileNotificationList $fileNotificationList
     */
    public function __construct(FileNotificationList $fileNotificationList)
    {
        $this->fileNotificationList = $fileNotificationList;
    }

    /**
     * Handle the process of adding a user school details
     * @param CreateUserSchoolDetailsRequest $request
     * @param UserSchoolDetailsRepository $repository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateUserSchoolDetailsRequest $request, UserSchoolDetailsRepository $repository){
        $set_admin = $repository->store($request);

        $method = $request->get('notify') ? 'subscribeTo' : 'unsubscribeFrom';

        $email = Auth::user()->email;

        $this->fileNotificationList->{$method}('fileNotificationSubscribers', $email);

        if($set_admin == null){
            Session::flash('flash_message', 'Welcome, you were placed in your class group automatically, and you were placed as the class representative');

            return redirect('/home');
        }

        Session::flash('flash_message', 'Welcome, you were placed in your class group automatically');

        return redirect('/home');
    }
}
