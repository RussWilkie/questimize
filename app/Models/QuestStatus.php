<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestStatus extends Model
{
    use HasFactory;

    public function quest(){
        return $this->hasMany('App\Models\Quest');
    }
}
