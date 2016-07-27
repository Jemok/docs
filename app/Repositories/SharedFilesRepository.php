<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 5:02 PM
 */

namespace app\Repositories;


class SharedFilesRepository
{
    /**
     * The model used by this repository
     * @var
     */
    protected $model;

    /**
     * SharedFilesRepository constructor.
     */
    public function __construct()
    {
        $this->model = '';
    }

    /**
     * Get the files shared for a particular group
     * @param $group_ids
     * @return mixed
     */
    public function getForUserGroup($group_ids){

        return $this->model->where('share_type', 0)->whereIn('receiver', $group_ids)->get();
    }

    public function getForUserInbox($user_id){

        return $this->model->where('share_type', 1)->where('receiver', $user_id)->get();
    }

}