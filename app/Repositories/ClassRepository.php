<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 12:38 PM
 */

namespace app\Repositories;


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
    public function __construct()
    {
        $this->model = '';
    }

    public function store($campus, $course, $year, $month, $group){

        return $this->model->create([
            'campus' => $campus,
            'course' => $course,
            'year'   => $year,
            'month'  => $month,
            'group'  => $group
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

        if($this->model->where('campus', $campus)
                       ->where('course', $course)
                       ->where('year', $year)
                       ->where('month', $month)
                       ->where('group', $group)->exist()
        ){

            return $this->model->where('campus', $campus)
                ->where('course', $course)
                ->where('year', $year)
                ->where('month', $month)
                ->where('group', $group)->first();
        }

        return null;
    }

    /**
     * Add a user to a particular class
     * @param $class
     */
    public function addMember($class){
        $class->members()->create([
            'user_id' => \Auth::user()->id
        ]);
    }

    /**
     * Add an admin to a class
     * @param $class
     */
    public function addAdmin($class){

        $class->admins()->create([
           'user_id' => \Auth::user()->id
        ]);
    }
}