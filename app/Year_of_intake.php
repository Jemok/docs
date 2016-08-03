<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year_of_intake extends Model
{
    /**
     * The table used by this table
     * @var string
     */
    protected $table = 'year_of_intakes';

    /**
     * The fields that can be mass assigned
     * @var array
     */
    protected $fillable = [
        'year'
    ];

    /**
     * Year_of_intake User relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function years(){

        return $this->belongsTo(User::class);
    }
}
