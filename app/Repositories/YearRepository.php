<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 11:11 AM
 */

namespace App\Repositories;


class YearRepository
{
    /**
     * The model used by this repository
     * @var string
     */
    protected $model;

    /**
     * YearRepository constructor.
     */
    public function __construct()
    {
        $this->model = '';
    }

    /**
     * Return all the years in the database
     * @return mixed
     */
    public function index(){

        return $this->model->all();
    }
}