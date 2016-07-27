<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 11:06 AM
 */

namespace App\Repositories;


class CampusRepository
{

    /**
     * The model used by this repository
     * @var string
     */
    protected $model;

    /**
     * CampusRepository constructor.
     */
    public function __construct()
    {
        $this->model = '';
    }

    /**
     * Returns all the campuses in the database
     * @return mixed
     */
    public function index(){
        return $this->model->all();
    }

}