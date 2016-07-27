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
use app\Repositories\ClassRepository;

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
     * @return bool
     */
    public function store($request){

        Auth::user()->intake()->create([
            'campus' => $request->campus,
            'course' => $request->course,
            'year'   => $request->year,
            'month'  => $request->month,
            'group'  => $request->group
        ]);

        $class_repository = new ClassRepository();

        $class = $class_repository->checkIfExists($request->campus,
                                            $request->course,
                                            $request->year,
                                            $request->month,
                                            $request->group);

        if($class == null){

            $class_repository->store($request->campus,
                                    $request->course,
                                    $request->year,
                                    $request->month,
                                    $request->group);
            $class_repository->addAdmin($class);
            $class_repository->addMember($class);

        }else{
            $class_repository->addMember($class);
        }

        return $class;
    }


}