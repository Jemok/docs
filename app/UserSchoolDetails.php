<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserSchoolDetails extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'user_school_details';

    /**
     * The fields that might be mass assigned
     * @var array
     */
    protected $fillable = [

        'status',
        'notify'
    ];

    /**
     * UserSchoolDetails User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return  $this->belongsTo(User::class);
    }
}
