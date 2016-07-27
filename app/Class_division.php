<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Class_division extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'class_divisions';


    /**
     * The fields that can be mass assigned
     * @var array
     */
    protected $fillable = [
        'division'
    ];

    /**
     * Class_divisions User relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
