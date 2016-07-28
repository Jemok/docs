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
        'name', 'email', 'password', 'account_type'
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

        if(Auth::user()->account_type == 0){
            return true;
        }
        return false;
    }

    /**
     * User Campus relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function campus(){
        return $this->hasMany(Campus::class);
    }

    /**
     * User Course Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function course(){

        return $this->hasMany(Course::class);
    }

    /**
     * User Year_of_intake relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function years(){
        return $this->hasMany(Year_of_intake::class);
    }

    /**
     * User Month_of_intake Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function months(){

        return $this->hasMany(Month_of_intake::class);
    }

    /**
     * User Class_divisions relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function divisions(){

        return $this->hasMany(Class_division::class);
    }

    /**
     * User UserIntake relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function intake(){

        return $this->hasMany(UserIntake::class);
    }

    /**
     * User Lecturer Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lecturer(){

        return $this->hasMany(Lecturer::class);
    }

    /**
     * The login status of a users account
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function login(){

        return $this->hasOne(LoginStatus::class);
    }

    /**
     * User Class_member Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function class_membership(){

        return $this->hasMany(Class_member::class);
    }

    /**
     * User SharedFile Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function shared_files(){

        return $this->hasMany(Shared_file::class);
    }
}
