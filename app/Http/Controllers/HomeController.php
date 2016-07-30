<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Repositories\CampusRepository;
use App\Repositories\ClassMembersRepository;
use App\Repositories\ClassRepository;
use App\Repositories\CourseRepository;
use App\Repositories\GroupRepository;
use App\Repositories\MonthRepository;
use App\Repositories\SharedFilesRepository;
use App\Repositories\YearRepository;
use App\User;
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
     * @param SharedFilesRepository $sharedFilesRepository
     * @param ClassRepository $classRepository
     * @param ClassMembersRepository $classMembersRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(CampusRepository $campusRepository,
                          CourseRepository $courseRepository,
                          YearRepository $yearRepository,
                          MonthRepository $monthRepository,
                          GroupRepository $groupRepository,
                          SharedFilesRepository $sharedFilesRepository,
                          ClassRepository $classRepository,
                          ClassMembersRepository $classMembersRepository
    )
    {
        if((Auth::user()->isStudent()) && (Auth::user()->hasSchoolDetails(Auth::user()->id) == 0)) {
            $campuses = $campusRepository->index();
            $courses = $courseRepository->index();
            $years = $yearRepository->index();
            $months = $monthRepository->index();
            $groups = $groupRepository->index();


            return view('school_details.create', compact('campuses', 'courses', 'years', 'months', 'groups'));

        }else if((Auth::user()->isStudent()) && (Auth::user()->hasSchoolDetails(Auth::user()->id) == 1)) {


                //$user_groups = $groupRepository->userGroups(\Auth::user()->id);

                //$group_files = $sharedFilesRepository->getForUserGroup($user_groups);

                //$inbox_files = $sharedFilesRepository->getForUserInbox(Auth::user()->id);

                $user_class = Auth::user()->intake()->with('year', 'month', 'course', 'division')->first();

                $class_name = $classRepository->makeName($user_class);

                $members = $classMembersRepository->getClassMembers(Auth::user()->class_membership()->first()->group_id);


                if (Auth::user()->login()->first()->status == 1) {

                    $login_status = 1;
                } else {
                    $login_status = 0;

                }

                return view('dashboards.student', compact('group_files', 'inbox_files', 'class_name', 'login_status', 'members'));
            }else if(Auth::user()->isLecturer()) {

                //$lecturer_group_ids = $classRepository->getLecturerClasses(Auth::user()->id);

                //$lecturer_groups = $groupRepository->getLecturerGroups($lecturer_group_ids);

                $class_name = '';

                return view('dashboards.lecturer', compact('lecturer_groups', 'class_name'));
            }
        }
}
