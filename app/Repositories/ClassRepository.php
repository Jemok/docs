<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 12:38 PM
 */

namespace App\Repositories;


use App\Group;

class ClassRepository
{
    /**
     * The model used by this repository
     * @var
     */
    protected $model;

    /**
     * ClassRepository constructor.
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
            'class_division_id'  => $group
        ]);
    }

    /**
     * Check if a class exists and return it
     * @param $campus
     * @param $course
     * @param $year
     * @param $month
     * @param $group
     * @return bool
     */
    public function checkIfExists($campus, $course, $year, $month, $group){

        if($this->model->where('campus_id', $campus)
                       ->where('course_id', $course)
                       ->where('year_of_intake_id', $year)
                       ->where('month_of_intake_id', $month)
                       ->where('class_division_id', $group)->exists()
        ){

            return $this->model->where('campus_id', $campus)
                ->where('course_id', $course)
                ->where('year_of_intake_id', $year)
                ->where('month_of_intake_id', $month)
                ->where('class_division_id', $group)->first();
        }

        return null;
    }

    /**
     * Add a user to a particular class
     * @param $class
     */
    public function addMember($class){

        if($class->members()->create([
            'user_id' => \Auth::user()->id
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

        return ClassMembers::where('member_type', 1)
                            ->where('user_id', $user_id)->lists('group_id');
    }

    public function makeName($user_class){

        $name = $user_class->year->year.' '.$user_class->month->month.' '.$user_class->course->course_name.' '.$user_class->division->division;

        return $name;
    }
}