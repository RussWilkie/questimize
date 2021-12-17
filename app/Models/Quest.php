<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'quest_status_id', 'quest_category_id', 'description'];

    public function questStatus(){
        return $this->belongsTo('App\Models\QuestStatus');
    }

    public function questCategory(){
        return $this->belongsTo('App\Models\QuestCategory');
    }
}
