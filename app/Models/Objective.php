<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'skill', 'xp_value', 'description', 'completed_at', 'archived_at'];
}
