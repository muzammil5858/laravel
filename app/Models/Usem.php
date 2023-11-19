<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $table = 'user';

    protected $fillable = ([
        'userid',
        'name',
        'email',
        'password',
        'user_type',
    ]);
}
