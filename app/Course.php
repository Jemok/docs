<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'courses';

    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [
        'course_name',
        'user_id'
    ];

    /**
     * Course User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }

    /**
     * Course Campus Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function campus(){

        return $this->belongsTo(Campus::class);
    }
}
