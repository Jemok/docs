<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class GroupController extends Controller
{
    public function getMembers(){

        return view('group.members');
    }

    public function showGroup(){

        return view('group.show');
    }
}
