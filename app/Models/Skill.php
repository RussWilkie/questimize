<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name'];

    public function subSkill(){
        return $this->hasMany('App\Models\SubSkill');
    }
}
