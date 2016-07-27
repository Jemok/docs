<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 11:17 AM
 */

namespace App\Repositories;


class GroupRepository
{
    /**
     * The model used by this repository
     * @var string
     */
    protected $model;

    /**
     * GroupRepository constructor.
     */
    public function __construct()
    {
        $this->model = '';
    }

    /**
     * Return all the groups in the database
     * @return mixed
     */
    public function index(){
        return $this->model->all();
    }
}