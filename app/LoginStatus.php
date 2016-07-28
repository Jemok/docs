<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoginStatus extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'login_statuses';

    /**
     * The fields that can be mass assigned
     * @var array
     */
    protected $fillable = [

        'status'
    ];

    /**
     * LoginStatus User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function  user(){
        return $this->belongsTo(User::class);
    }
}
