<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable =
    [
        'nama',
        'nis',
        'kelas',
        'jk',
    ];
    protected $dates =
    [
        'created_at',
        'updated_at'
    ];
}
