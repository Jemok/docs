<?php

namespace App\Http\Controllers;

use App\Class_member;
use App\Group;
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

                $user_groups = $groupRepository->userGroups(\Auth::user()->id);

                 $group_files = $sharedFilesRepository->getForUserGroup($user_groups);

                $last_login = Auth::user()->login()->first()->updated_at;

                $new_group_files_count = $sharedFilesRepository->countNewSharedFiles($user_groups, $last_login);


                 $inbox_files = $sharedFilesRepository->getForUserInbox(Auth::user()->id);

                $new_inbox_files_count = $sharedFilesRepository->countUserInbox(Auth::user()->id, $last_login);


                $user_class = Auth::user()->intake()->with('year', 'month', 'course', 'division')->first();

                $group_id = Class_member::where('user_id', Auth::user()->id)->first()->group_id;

                $class_code = Group::where('id', $group_id)->first()->group_code;


                $class_name = $classRepository->makeName($user_class);

                $members = $classMembersRepository->getClassMembers(Auth::user()->class_membership()->first()->group_id);


                if (Auth::user()->login()->first()->status == 1) {

                    $login_status = 1;

                    Auth::user()->login()->update([
                       'status' => 1
                    ]);
                } else {
                    $login_status = 0;

                    Auth::user()->login()->update([
                        'status' => 0
                    ]);


                }

                return view('dashboards.student', compact('group_files', 'inbox_files', 'class_name', 'class_code', 'login_status', 'last_login', 'members', 'new_group_files_count', 'new_inbox_files_count'));
            }else if(Auth::user()->isLecturer()) {

                $lecturer_group_ids = $classRepository->getLecturerClasses(Auth::user()->id);

                $lecturer_groups = $groupRepository->getLecturerGroups($lecturer_group_ids);

                $lecturer_files = $sharedFilesRepository->getForLecturerGroups();

                return view('dashboards.lecturer', compact('lecturer_groups', 'classRepository', 'lecturer_files'));
            }
        }
}
