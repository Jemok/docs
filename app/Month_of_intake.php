<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Month_of_intake extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'month_of_intakes';

    /**
     * The fields that can be mass assigned
     * @var array
     */
    protected $fillable = [
        'month'
    ];

    /**
     * Month_of_intake User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }
}
