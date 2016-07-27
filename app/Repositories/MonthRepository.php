<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 11:14 AM
 */

namespace App\Repositories;


class MonthRepository
{
    /**
     * The model used by this repository
     * @var
     */
    protected $model;

    /**
     * MonthRepository constructor.
     */
    public function __construct()
    {
        $this->model = '';
    }

    /**
     * Return all the months in the database
     * @return mixed
     */
    public function index(){
        return $this->model->all();
    }
}