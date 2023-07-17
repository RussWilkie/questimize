<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubSkill extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['name', 'main_skill_id'];

    public function skill(){
        return $this->belongsTo('App\Models\Skill');
    }
    
    public function activities(){
        return $this->hasMany('App\Models\Activities');
    }
}
