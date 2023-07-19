<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activities extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['sub_skill_id'];

    public function subSkills(){
        return $this->belongsTo('App\Models\SubSkill', 'sub_skill_id');
    }
}
