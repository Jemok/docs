<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'lecturers';

    /**
     * The fields that might be mass assigned
     * @var array
     */
    protected $fillable = [
        'staff_id',
        'campus_id'
    ];

    /**
     * Lecturer User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }
}
