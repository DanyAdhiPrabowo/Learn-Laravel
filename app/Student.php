<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    protected $fillable = ['nama', 'npm', 'email', 'jurusan'];
    use SoftDeletes;
}
