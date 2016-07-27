<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'groups';

    /**
     * The fields that can be mass assigned
     * @var array
     */
    protected $fillable = [

        'campus_id',
        'course_id',
        'year_of_intake_id',
        'month_of_intake_id',
        'class_division_id'
    ];

    /**
     * Group Class_rep Relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function representative(){

        return $this->hasMany(Class_rep::class);
    }

    /**
     * Group Class_member relationship
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function members(){

        return $this->hasMany(Class_member::class);
    }


}
