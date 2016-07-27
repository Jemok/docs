<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserIntake extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $model = 'user_intakes';

    /**
     *
     * @var array
     */
    protected $fillable = [

        'campus_id',
        'month_of_intake_id',
        'course_id',
        'year_of_intake_id',
        'class_division_id'
    ];

    /**
     * UserIntake User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }

    /**
     * UserIntake Campus Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campus(){

        return $this->belongsTo(Campus::class);
    }

    /**
     * UserIntake Course Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course(){

        return $this->belongsTo(Course::class);
    }

    /**
     * UserIntake Month_of_Intake Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function month(){

        return $this->belongsTo(Month_of_intake::class);
    }

    /**
     * UserIntake Year_of_Intake Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function year(){

        return $this->belongsTo(Year_of_intake::class);
    }

    /**
     * UserIntake Class_division Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function division(){

        return $this->belongsTo(Class_division::class);
    }
}