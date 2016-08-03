<?php

namespace App;

use App\Observers\NotificationObserver;
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


    /**
     * Shared_file File Relationship
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function file(){

        return $this->belongsTo(File::class);
    }

    public function group(){

        return $this->belongsTo(Group::class, 'receiver');
    }

    public function file_receiver(){

        return $this->belongsTo(User::class, 'receiver');
    }


    /**
     *
     */
    public static function boot(){

        parent::boot();

        Shared_file::observe(new NotificationObserver());
    }
}
