<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 10:45 AM
 */

namespace App\Repositories;


use App\Group;
use App\UserIntake;
use App\UserSchoolDetails;
use Illuminate\Support\Facades\Auth;
use App\Repositories\ClassRepository;

class UserSchoolDetailsRepository
{
    /**
     * The model for this repository
     * @var UserSchoolDetails
     */
    protected $model;

    /**
     * UserSchoolDetailsRepository constructor.
     * @param UserSchoolDetails $userSchoolDetails
     */
    public function __construct(UserSchoolDetails $userSchoolDetails)
    {
        $this->model = $userSchoolDetails;
    }

    /**
     * Persist a user intake details in the database
     * @param $request
     * @return bool
     */
    public function store($request){

        Auth::user()->intake()->create([
            'campus_id' => $request->campus,
            'course_id' => $request->course,
            'year_of_intake_id'   => $request->year,
            'month_of_intake_id'  => $request->month,
            'class_division_id'  => $request->group
        ]);

        $class_repository = new ClassRepository(new Group());

        $class_check = $class_repository->checkIfExists($request->course, $request->year, $request->month);

        if($class_check == null){

            $class = $class_repository->store($request->campus,
                                    $request->course,
                                    $request->year,
                                    $request->month,
                                    $request->group);
            $class_repository->addAdmin($class);

            $member_answer = $class_repository->addMember($class, 0);

            if($member_answer == true){


                Auth::user()->school_details()->first()->update([
                    'status' => 1
                ]);
            }

        }else{
            $member_answer = $class_repository->addMember($class_check, 0);

            if($member_answer == true){


                Auth::user()->school_details()->update([
                    'status' => 1
                ]);
            }
        }

        return $class_check;
    }


}