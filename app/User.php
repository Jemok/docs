<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User UserSchoolDetails Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function school_details(){
        return  $this->hasOne(UserSchoolDetails::class);
    }

    /**
     * Return the status of a students school details
     * @return mixed
     */
    public function hasSchoolDetails(){

        return $this->school_details()->first()->status;
    }


    /**
     * Check if auth user is a lecturer
     * @return bool
     */
    public function isLecturer(){

        if(!$this->isStudent()){
            return true;
        }
        return false;
    }

    /**
     * Check if auth user is a student
     * @return bool
     */
    public function isStudent(){

        Auth::user()->account_type = 0;

        if(Auth::user()->account_type == 1){
            return true;
        }
        return false;
    }
}
