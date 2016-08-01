<?php

namespace App\Http\Controllers;

use App\Group;
use App\Repositories\ClassMembersRepository;
use App\Repositories\ClassRepository;
use App\Repositories\FavoriteRepository;
use App\Repositories\GroupRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GroupController extends Controller
{
    public function getMembers(ClassMembersRepository $classMembersRepository){

        $members = $classMembersRepository->getAllClassMembers(Auth::user()->class_membership()->first()->group_id);

        return view('group.members', compact('members'));
    }

    public function showGroup($group_id, $group_name, $group_code){

        return view('group.show', compact('group_id', 'group_name', 'group_code'));
    }

    /**
     * Add a group to lecturers favorite groups
     * @param $group_id
     * @param FavoriteRepository $favoriteRepository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function addLecturerFavorite($group_id, FavoriteRepository $favoriteRepository, ClassRepository $classRepository){

        $favoriteRepository->addFavorite($group_id, Auth::user());

        $group = Group::findOrFail($group_id);

        $classRepository->addMember($group, 1);

        Session::flash('flash_message', 'Group was added to your favorites');

        return redirect('home');
    }
}
