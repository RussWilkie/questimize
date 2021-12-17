<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestCategory extends Model
{
    use HasFactory;

    public function quest(){
        return $this->hasMany('App\Models\Quest');
    }
}
