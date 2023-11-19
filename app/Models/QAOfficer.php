<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QAOfficer extends Model
{
    use HasFactory;
    protected $guard = [];
    protected $table = 'q_a_officers';
}
