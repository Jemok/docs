<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campus extends Model
{
    /**
     * The table used by this model
     * @var string
     */
   protected $table ='campuses';

    /**
     * The fields that might be mass assigned
     * @var array
     */
   protected $fillable = [

       'campus_name'
   ];

    /**
     * Campus User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }
}
