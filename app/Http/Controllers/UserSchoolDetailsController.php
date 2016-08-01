<?php

namespace App\Http\Controllers;

use App\Repositories\UserSchoolDetailsRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\CreateUserSchoolDetailsRequest;

class UserSchoolDetailsController extends Controller
{
    /**
     * Handle the process of adding a user school details
     * @param CreateUserSchoolDetailsRequest $request
     * @param UserSchoolDetailsRepository $repository
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(CreateUserSchoolDetailsRequest $request, UserSchoolDetailsRepository $repository){
        $set_admin = $repository->store($request);


        if($set_admin == null){
            Session::flash('flash_message', 'Welcome, you were placed in your class group automatically, and you were placed as the class representative');

            return redirect('/home');
        }

        Session::flash('flash_message', 'Welcome, you were placed in your class group automatically');

        return redirect('/home');
    }
}
