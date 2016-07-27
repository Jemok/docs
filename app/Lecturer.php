<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lecturer extends Model
{
    protected $fillable = [
        'id_number',
        'staff_id'
    ];
}
