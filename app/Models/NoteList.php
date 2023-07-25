<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoteList extends Model
{
    use HasFactory;

    protected $table = 'note_lists';

    public function userInfo()
    {
        return $this->belongsTo('App\Models\UserInfo', 'id', 'user_id');
    }
}