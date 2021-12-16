<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'quest_status_id', 'description'];

    public function questStatus(){
        return $this->belongsTo('App\Models\QuestStatus');
    }
}
