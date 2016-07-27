<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\CampusRepository;
use App\Repositories\CourseRepository;
use App\Repositories\GroupRepository;
use App\Repositories\MonthRepository;
use App\Repositories\YearRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(CampusRepository $campusRepository,
                          CourseRepository $courseRepository,
                          YearRepository $yearRepository,
                          MonthRepository $monthRepository,
                          GroupRepository $groupRepository
    )
    {
        /**
         * Check whether a user school details
         * are set.
         */
        if(Auth::user()->hasSchoolDetails() == 0){
//            $campases = $campusRepository->index();
//            $courses = $courseRepository->index();
//            $years = $yearRepository->index();
//            $months = $monthRepository->index();
//            $groups = $groupRepository->index();
            return view('school_details.create', compact('campases', 'courses', 'years', 'months', 'groups'));
        }

        return view('home');
    }
}
