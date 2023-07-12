<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillLog extends Model
{
    use HasFactory;

    protected $fillable = ['sub_skill_id', 'activity', 'xp_value', 'notes'];

    public function subskill(){
        return $this->belongsTo('App\Models\SubSkill');
    }
}
