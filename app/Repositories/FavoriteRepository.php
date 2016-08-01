<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/31/16
 * Time: 11:03 PM
 */

namespace App\Repositories;
use App\LecturerFavorite;
use Illuminate\Support\Facades\Auth;


class FavoriteRepository
{
    /**
     * The model associated with this repository
     * @var
     */
    protected $model;

    /**
     * FavoriteRepository constructor.
     * @param LecturerFavorite $lecturerFavorite
     */
    public function __construct(LecturerFavorite $lecturerFavorite)
    {
        $this->model = $lecturerFavorite;
    }

    /**
     * Add a new group to lecturers favorites
     * @param $group_id
     * @param $user
     */
    public function addFavorite($group_id, $user){

        $user->favorite()->create([

            'group_id' => $group_id,
            'status'   => 1
        ]);
    }

    /**
     * Confirm if the lecturer has already joined the group
     * @param $group
     * @return bool|null
     */
    public function confirm($group){

        if(LecturerFavorite::where('user_id', Auth::user()->id)
                            ->where('group_id', $group->id)->exists()){

            return !null;
        }else{

            return null;
        }

    }


}