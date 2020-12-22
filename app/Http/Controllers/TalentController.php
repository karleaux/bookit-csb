<?php

namespace BookIt\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BookIt\Talent;
use BookIt\User;
use BookIt\Fave;

class TalentController extends Controller
{
    public function view(Request $request) {
        $request -> session() -> get('results', []);
        $talents = Talent::all();
        $request -> session() -> put('results', $talents);
        return view('talent/talents', ['talents'=> $talents]);
    }

    public function search(Request $request) {
        $query = $request -> input('query');
        $talents = Talent::where('description', 'LIKE', '%' . $query . '%') -> orWhere('talent_name', 'LIKE', '%' . $query . '%') -> get();
        if(count($talents) > 0) {
            return view('talent/talents')->withDetails($talents);
        } else if(count($talents) == 0) {
            return view('talent/talents', ['talents' => $talents]);
        }
    }

    public function details(Request $request, $id)
    {
        $talent = Talent::findOrFail($id);
        $favenumber = Fave::where('talent_id',$id)->count();
        $userid = (Auth::user() ?? new User)->user_id;
        $favorited = Fave::where('user_id',$userid)->get();
        $isfave = 'false';
        foreach($favorited as $x)
        {
            if ($x -> talent_id == $id ) {
                $isfave = 'true';
                break;
            }
        }
       $favenumber = [$favenumber,$isfave];
        return view('talent/view',['talent'=>$talent],['faved'=>$favenumber]);
    }
}
