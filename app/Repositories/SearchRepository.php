<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 7/29/16
 * Time: 2:27 AM
 */

namespace App\Repositories;

use App\User;


class SearchRepository
{

    public function search($query){

        return User::where('name', 'LIKE', "%$query%")
            ->where('account_type', 0)
            ->orWhere('email', 'LIKE', "%$query%")
            ->paginate(10);

    }

}