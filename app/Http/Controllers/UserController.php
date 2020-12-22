<?php

namespace BookIt\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BookIt\User;
use BookIt\Talent;

class UserController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        $talents = Talent::where('user_id', $user -> user_id) -> get();
        return view('user/profile', ['talents' => $talents]);
    }

    public function details(Request $request, $user_id){
        if($user_id == Auth::id()){
            return redirect('user/profile');
        }
        $user = User::findOrFail($user_id);
        $talents = Talent::where('user_id', $user -> user_id) -> get();
        return view('user/details', ['user' => $user], ['talents' => $talents]);
    }

    public function edit()
    {
        return view('user/edit');
    }

    public function edit_save(Request $request){
        $user = Auth::user();

        if($request->imageupload != null){
            $imageName = $user->user_id.'.'.$request->imageupload->getClientOriginalExtension();
            $request->validate([
            'imageupload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->imageupload->move(public_path('images/users'), $imageName);
        } else {
            $imageName = Auth::user()->imageurl;
        }
        $user->user_id = $request->input('user_id');
        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->location = $request->input('location');
        $user->imageurl = $imageName;
        $user->userbio = $request->input('userbio');
        $user->save();
        $request->flash('message', 'User successfully edited.');
        return redirect('/user/profile');
    }

    public function getusertalents() {
        $user = Auth::user();
        $talents = Talent::where('user_id', $user -> id) -> get();
        return view('user/talents', ['talents' => $talents]);
    }

    public function addtalent() {
        return view('user/addtalent');
    }

    public function inserttalent(Request $request) {
        $user = Auth::user();
        $talent = new Talent;
        $talent -> user_id = $user -> user_id;
        $talent -> talent_name = $request -> input('talentname');
        $talent -> description = $request -> input('description');
        $talent -> price = $request -> input('price');
        $talent -> save();
        $lastid = $talent->talent_id;
        if($request->imageupload != null){
            $imageName = $lastid.'.'.$request->imageupload->getClientOriginalExtension();
            $request->validate([
                'imageupload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:13300',
            ]);
            $request->imageupload->move(public_path('images/talents'), $imageName);
        } else {
            $imageName = 'default.jpg';
        }
        $talent = Talent::find($lastid);
        $talent -> image_url = $imageName;
        $talent -> save();
        $request -> flash('message', 'Talent Added.');
        return redirect('user/profile');
    }

    public function edittalent(Request $request, $talent_id) {
        $talent = Talent::findOrFail($talent_id);
        return view('user/edittalent', ['talents' => $talent]);
    }

    public function updatetalent(Request $request, $talent_id) {
        $user = Auth::user();
        $talent = Talent::findOrFail($talent_id);
        $talent -> user_id = $user -> user_id;
        $talent -> talent_name = $request -> input('talentname');
        $talent -> description = $request -> input('description');
        $talent -> price = $request -> input('price');
        $talent -> save();
        $lastid = $talent->talent_id;
        if($request->imageupload != null){
            $imageName = $lastid.'.'.$request->imageupload->getClientOriginalExtension();
            $request->validate([
                'imageupload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->imageupload->move(public_path('images/talents'), $imageName);
        } else {
            $imageName = 'default.jpg';
        }
        $talent = Talent::find($lastid);
        $talent -> image_url = $imageName;
        $talent -> save();
        $request -> flash('message', 'Talent Added.');
        return redirect('user/profile');
    }

    public function removetalent(Request $request, $talent_id) {
        $talent = Talent::findOrFail($talent_id);
        $talent->delete();
        $request->flash('message', 'Record successfully deleted.');
        return redirect('user/profile');
    }
}
