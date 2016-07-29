<?php

namespace App\Http\Controllers;

use App\Group;
use App\Repositories\ClassRepository;
use App\Repositories\SearchRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SearchRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{
    /**
     * Search a user
     * @param SearchRequest $searchRequest
     * @param SearchRepository $searchRepository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(SearchRequest $searchRequest, SearchRepository $searchRepository, ClassRepository $classRepository){

        $query = $searchRequest->search;

        if($query){

            $users = $searchRepository->search($query);

            $group_names = $this->loopClassNames($users, new ClassRepository(new Group()));
        }

        $user_class = Auth::user()->intake()->with('year', 'month', 'course', 'division')->first();

        $class_name = $classRepository->makeName($user_class);
        return view('search.search_results', compact('users', 'group_names', 'class_name'));
    }

    /**
     * loop the class names of the users
     * @param $users
     * @param ClassRepository $classRepository
     * @return array
     */
    public function loopClassNames($users, ClassRepository $classRepository){

        foreach ($users as $user){

            $user_class = $user->intake()->with('year', 'month', 'course', 'division')->first();

            $class_name[] = $classRepository->makeName($user_class);

            return $class_name;
        }
    }
}
