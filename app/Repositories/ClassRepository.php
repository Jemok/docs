<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 12:38 PM
 */

namespace App\Repositories;


use App\Class_member;
use App\Group;
use App\UserIntake;

class ClassRepository
{
    /**
     * The model used by this repository
     * @var
     */
    protected $model;

    /**
     * ClassRepository constructor.
     * @param Group $group
     */
    public function __construct(Group $group)
    {
        $this->model = $group;
    }

    public function store($campus, $course, $year, $month, $group){

        return $this->model-> create([
            'campus_id' => $campus,
            'course_id' => $course,
            'year_of_intake_id'   => $year,
            'month_of_intake_id'  => $month,
            'class_division_id'  => $group,
            'group_code'         => rand(11111,99999)
        ]);
    }

    /**
     * Check if a class exists and return it
     * @param $course
     * @param $year
     * @param $month
     * @return null
     */
    public function checkIfExists($course, $year, $month){

        if($this->model
                ->where('course_id', $course)
                ->where('year_of_intake_id', $year)
                ->where('month_of_intake_id', $month)
                ->exists()
        ){

            return $this->model
                        ->where('course_id', $course)
                        ->first();
        }

        return null;
    }

    /**
     * @param $class
     * @param $member_type
     * @return bool
     */
    public function addMember($class, $member_type){

        if($class->members()->create([
            'user_id' => \Auth::user()->id,
            'member_type' => $member_type
        ])){

            return true;
        }else{

            return false;
        }
    }

    /**
     * Add an admin to a class
     * @param $class
     */
    public function addAdmin($class){

        $class->representative()->create([
           'user_id' => \Auth::user()->id
        ]);
    }

    public function getLecturerClasses($user_id){

        return Class_member::where('member_type', 1)
                            ->where('user_id', $user_id)->lists('group_id');
    }

    public function makeName($user_class){

        $name = $user_class->year->year.' '.$user_class->month->month.' '.$user_class->course->course_name.' '.$user_class->division->division;

        return $name;
    }
}