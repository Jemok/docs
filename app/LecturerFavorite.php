<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LecturerFavorite extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'lecturer_favorites';

    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [

        'status',
        'group_id'
    ];

    /**
     * LecturerFavorite User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * LecturerFavorite Group Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group(){
        return $this->belongsTo(Group::class);
    }
}
