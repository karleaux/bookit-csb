<?php

namespace BookIt\Http\Controllers;

use Illuminate\Http\Request;
use BookIt\Fave;

class FaveController extends Controller
{
    //

    public function store(Request $request, $talent, $user)
    {
        $fave = new Fave;
        $fave->user_id = $user;
        $fave->talent_id = $talent;
        $fave->save();
        return back();
        
    }

    public function remove(Request $request,$id,$user)
    {
        $fave = Fave::where('talent_id',$id)->where('user_id',$user)->delete();
        
        return back();
        
        
    }
}
