<?php

namespace App\Http\Controllers;

use App\Repositories\ClassRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\SearchRequest;
use App\User;
use Illuminate\Support\Facades\Auth;

class SearchController extends Controller
{

    public function search(SearchRequest $searchRequest, ClassRepository $classRepository){

        $query = $searchRequest->search;

        if($query){

            $users = User::where('name', 'LIKE', "%$query%")
                ->where('account_type', 0)
                ->orWhere('email', 'LIKE', "%$query%")
                ->paginate(10);

            foreach ($users as $user){

                $user_class = $user->intake()->with('year', 'month', 'course', 'division')->first();

                $class_name[] = $classRepository->makeName($user_class);
            }

        }

        return view('search.search_results', compact('users', 'class_name'));
    }
}
