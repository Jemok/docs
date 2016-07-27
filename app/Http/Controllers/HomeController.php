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


    /**
     * Handle which dashboard should be returned
     * @param CampusRepository $campusRepository
     * @param CourseRepository $courseRepository
     * @param YearRepository $yearRepository
     * @param MonthRepository $monthRepository
     * @param GroupRepository $groupRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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
        if(Auth::user()->isStudent() && Auth::user()->hasSchoolDetails() == 0){
//            $campases = $campusRepository->index();
//            $courses = $courseRepository->index();
//            $years = $yearRepository->index();
//            $months = $monthRepository->index();
//            $groups = $groupRepository->index();
            return view('school_details.create', compact('campases', 'courses', 'years', 'months', 'groups'));
        }

        /**
         * Return the student's dashboard
         */
        if(Auth::user()->isStudent() && Auth::user()->hasSchoolDetails() == 1){
            return view('dashboards.student');
        }

        /**
         * Return the lecturer's dashboard
         */
        if(Auth::user()->isLecturer()){
            return view('dashboards.lecturer');
        }
    }
}
