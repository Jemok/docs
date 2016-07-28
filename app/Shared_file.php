<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shared_file extends Model
{
    /**
     * The table used by thsi model
     * @var string
     */
    protected $table = 'shared_files';

    /**
     * Fields that can be mass assigned
     * @var array
     */
    protected $fillable = [
        'receiver',
        'share_type',
        'file_id'
    ];

    /**
     * Shared_file User Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){

        return $this->belongsTo(User::class);
    }
}
