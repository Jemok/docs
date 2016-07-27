<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 11:09 AM
 */

namespace App\Repositories;


class CourseRepository
{
    /**
     * The model used by this repository
     * @var string
     */
    protected $model;

    /**
     * CourseRepository constructor.
     */
    public function __construct()
    {
        $this->model = '';
    }

    /**
     * Return all the courses in the database
     * @return mixed
     */
    public function index(){
        return $this->model->all();
    }
}