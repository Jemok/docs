<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 11:06 AM
 */

namespace App\Repositories;
use App\Campus;


class CampusRepository
{

    /**
     * The model used by this repository
     * @var string
     */
    protected $model;

    /**
     * CampusRepository constructor.
     * @param Campus $campus
     */
    public function __construct(Campus $campus)
    {
        $this->model = $campus;
    }

    /**
     * Returns all the campuses in the database
     * @return mixed
     */
    public function index(){
        return $this->model->all();
    }

}