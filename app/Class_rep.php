<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_rep extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'class_reps';

    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [

        'user_id'
    ];

    /**
     * Class_rep Group Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group(){

        return $this->belongsTo(Group::class);
    }
}
