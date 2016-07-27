<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 10:45 AM
 */

namespace app\Repositories;


use App\UserSchoolDetails;
use Illuminate\Support\Facades\Auth;

class UserSchoolDetailsRepository
{
    /**
     * The model for this repository
     * @var UserSchoolDetails
     */
    protected $model;

    /**
     * UserSchoolDetailsRepository constructor.
     * @param UserSchoolDetails $userSchoolDetails
     */
    public function __construct(UserSchoolDetails $userSchoolDetails)
    {
        $this->model = $userSchoolDetails;
    }

    /**
     * Persist a user intake details in the database
     * @param $request
     */
    public function store($request){

        Auth::user()->intake()->create([
            'campus' => $request->campus,
            'course' => $request->course,
            'year'   => $request->year,
            'month'  => $request->month,
            'group'  => $request->group
        ]);
    }
}