<?php

namespace App\Http\Controllers;

use app\Repositories\UserSchoolDetailsRepository;
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
        $repository->store($request);

        Session::flash('flash_message', 'Welcome, you were placed in your class group automatically');

        return redirect('/home');
    }
}
