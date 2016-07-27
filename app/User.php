<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

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
}
