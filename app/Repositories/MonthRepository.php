<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 11:14 AM
 */

namespace App\Repositories;
use App\Month_of_intake;


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
    public function __construct(Month_of_intake $month_of_intake)
    {
        $this->model = $month_of_intake;
    }

    /**
     * Return all the months in the database
     * @return mixed
     */
    public function index(){
        return $this->model->all();
    }
}