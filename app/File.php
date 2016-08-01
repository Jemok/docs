<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    /**
     * The table used by this model
     * @var string
     */
    protected $table = 'files';

    /**
     * The fields that can be mass assigned
     * @var array
     */
    protected $fillable = [
        'file_name',
        'description',
        'title',
        'extension',
        'share_type'
    ];

    /**
     * File Shared_file Relationship
     */
    public function shared(){

        $this->hasMany(Shared_file::class);
    }
}
