<?php

namespace BookIt;

use Illuminate\Database\Eloquent\Model;

class Offer extends Model
{
    protected $primaryKey = 'offer_id';
    
    function talent() {
        return $this->belongsTo('App\Talent');
    }
    function user(){
        return $this->belongsTo('App\User');
    }
}
