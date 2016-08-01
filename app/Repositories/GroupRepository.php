<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 11:17 AM
 */

namespace App\Repositories;


use App\Class_member;
use App\Group;
use App\Class_division;

class GroupRepository
{
    /**
     * The model used by this repository
     * @var string
     */
    protected $model;

    /**
     * GroupRepository constructor.
     * @param Class_division $class_division
     */
    public function __construct(Class_division $class_division)
    {
        $this->model = $class_division;
    }

    /**
     * Return all the groups in the database
     * @return mixed
     */
    public function index(){
        return $this->model->all();
    }

    /**
     * Get the id's of the groups that a user belongs
     * @param $user_id
     * @return mixed
     */
    public function userGroups($user_id){

        return Class_member::where('user_id', $user_id)->get(['group_id']);
    }

    /**
     * @param $lecturer_group_id
     * @return mixed
     */
    public function getLecturerGroups($lecturer_group_id){

        return Group::whereIn('id', $lecturer_group_id)->get();
    }
}