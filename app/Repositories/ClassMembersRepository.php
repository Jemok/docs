<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/29/16
 * Time: 4:47 AM
 */

namespace App\Repositories;
use App\Class_member;


class ClassMembersRepository
{
    /**
     * The model used by this repository
     * @var
     */
    protected $model;

    /**
     * ClassMembersRepository constructor.
     * @param Class_member $class_member
     */
    public function __construct(Class_member $class_member)
    {
        $this->model = $class_member;
    }


    /**
     * Get all the members of a particular group
     * @param $class_id
     * @return mixed
     */
    public function getClassMembers($class_id){

        return $this->model->where('group_id', $class_id)->with('user')->get();
    }
}