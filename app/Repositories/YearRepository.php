<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 11:11 AM
 */

namespace App\Repositories;
use App\Year_of_intake;


class YearRepository
{
    /**
     * The model used by this repository
     * @var string
     */
    protected $model;

    /**
     * YearRepository constructor.
     * @param Year_of_intake $year_of_intake
     */
    public function __construct(Year_of_intake $year_of_intake)
    {
        $this->model = $year_of_intake;
    }

    /**
     * Return all the years in the database
     * @return mixed
     */
    public function index(){

        return $this->model->all();
    }
}