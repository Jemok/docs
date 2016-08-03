<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_member extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'class_members';

    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [

        'member_type',
        'user_id',
    ];

    /**
     * Class_member User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }


    /**
     * Group User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group(){

        return $this->belongsTo(UserIntake::class);
    }
}
