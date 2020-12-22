<?php

namespace BookIt;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use BookIt\User;

class Talent extends Model
{
    protected $primaryKey = 'talent_id';
    public function talents() {
        return $this->belongsTo(User::class);
    }

    public function user() {
        return User::find($this -> user_id);
    }
}
