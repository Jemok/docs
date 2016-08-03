<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/27/16
 * Time: 5:02 PM
 */

namespace App\Repositories;
use App\Shared_file;
use Illuminate\Support\Facades\Auth;


class SharedFilesRepository
{
    /**
     * The model used by this repository
     * @var
     */
    protected $model;

    protected $group_id = [];

    /**
     * SharedFilesRepository constructor.
     */
    public function __construct(Shared_file $shared_file)
    {
        $this->model = $shared_file;
    }

    /**
     * Get the files shared for a particular group
     * @param $group_ids
     * @return mixed
     */
    public function getForUserGroup($group_ids){

        foreach ($group_ids as $group){

            $this->group_id[] = $group->group_id;
        }

        return $this->model->whereIn('receiver', $this->group_id)->where('share_type', 1)->with('file', 'user', 'group')->latest()->paginate(6,['*'], 'group_files_page');
    }

    /**
     * Get the files shared with another user
     * @param $user_id
     * @return mixed
     */
    public function getForUserInbox($user_id){

        return $this->model->where('share_type', 0)->where('user_id', $user_id)->orWhere('receiver', $user_id)->with('file', 'user', 'file_receiver')->latest()->paginate(6,['*'], 'individual_files_page');
    }

    public function countNewSharedFiles($group_ids, $last_login){

        foreach ($group_ids as $group){

            $this->group_id[] = $group->group_id;
        }

        return $this->model->whereIn('receiver', $this->group_id)->where('share_type', 1)->where('user_id', '!=', Auth::user()->id)->where('updated_at', '>', $last_login)->count();

    }

    public function countUserInbox($user_id, $last_login){

        return $this->model->where('share_type', 0)->where('updated_at', '>', $last_login)->where('receiver', $user_id)->count();

    }

    /**
     * Get the files shared for a particular group
     * @param $group_ids
     * @return mixed
     */
    public function getForLecturerGroups(){

        return $this->model->where('user_id', Auth::user()->id)->where('share_type', 1)->with('file', 'user', 'group')->latest()->paginate(6,['*'], 'group_files_page');
    }

}