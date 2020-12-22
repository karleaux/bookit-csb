<?php

namespace BookIt\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use BookIt\User;
use BookIt\Talent;
use BookIt\Offer;

class OfferController extends Controller
{
    public function addoffer(Request $request, $talent_id) {
        $talent = Talent::findOrFail($talent_id);

        return view('offer/add', ['talent' => $talent]);
    }

    public function clientcanceloffer(Request $request,$offer_id)
    {
        $offer = Offer::findOrFail($offer_id);
        $offer->status = 'Cancelled by Client';
        $offer->save();
        return redirect('offer/clientviewoffers');
        
    }
    //client side
    public function clientviewoffers(Request $request)
    {
        $userid = Auth::user()->user_id;
        $offers = Offer::where('offers.user_id',$userid)
                ->join('talents','talents.talent_id','=','offers.talent_id')
                ->join('users','users.user_id','=','talents.user_id')
                ->orderBY('offers.created_at','desc')
                ->get([
                    'offers.offer_id','offers.details','offers.status','offers.created_at','offers.image_url',
                    'users.user_id','users.firstname','users.lastname',
                    'talents.talent_id','talents.talent_name', 'talents.price']);
        return view('offer/clientviewoffers', ['offers' => $offers]);
    }
    //talent side
    public function gettalentrequests() {
        $user = Auth::user();
        $offers = Offer::where('talents.user_id',$user->user_id)
                ->join('talents','talents.talent_id','=','offers.talent_id')
                ->join('users','users.user_id','=','offers.user_id')
                ->get([
                    'offers.offer_id','offers.details','offers.status','offers.created_at','offers.image_url',
                    'users.user_id','users.firstname','users.lastname',
                    'talents.talent_id','talents.talent_name', 'talents.price']);
        return view('offer/myoffers', ['offers' => $offers]);
    }

    public function insertoffer(Request $request, $talent_id) {
        $offer = new Offer;
        $offer -> user_id = Auth::id();
        $offer -> talent_id = $talent_id;
        $offer -> details = $request -> input('details');
        $offer -> status = 'Waiting';
        $offer -> save();
        $request -> flash('message', 'Offer Added.');
        return redirect('/talents'); //redirect to search
    }
    public function acceptoffer(Request $request, $offer_id) {
        $offer = Offer::findOrFail($offer_id);
        $offer -> status = 'Accepted';
        $offer -> save();
        $request -> flash('message', 'Offer Accepted.');
        return redirect('/offer/gettalentrequests');
    }

    public function rejectoffer(Request $request, $offer_id) {
        $offer = Offer::findOrFail($offer_id);
        $offer -> status = 'Rejected';
        $offer -> save();
        $request -> flash('message', 'Offer Rejected.');
        return redirect('/offer/gettalentrequests');
    }

    public function canceloffer(Request $request, $offer_id) {
        $offer = Offer::findOrFail($offer_id);
        $offer -> status = 'Cancelled';
        $offer -> save();
        $request -> flash('message', 'Offer Rejected.');
        return redirect('/offer/gettalentrequests');
    }

    public function completeoffer($offer_id) {
        return view('/offer/completeoffer', ['offer_id' => $offer_id]);
    }

    public function submitcompletedoffer(Request $request) {
        $user = Auth::user();
        $offer_id = $request -> input('offer_id');
        $offer = Offer::findOrFail($offer_id);
        if($request->imageupload != null){
            $imageName = $offer_id.'_completed.'.$request->imageupload->getClientOriginalExtension();
            $request->validate([
            'imageupload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $request->imageupload->move(public_path('images/completedoffer'), $imageName);
        } else {
            $imageName = Auth::user()->imageurl;
        }
        $offer -> image_url =  $imageName;
        $offer -> status = 'Completed';
        $offer -> save();
        return redirect('/offer/gettalentrequests');
    }
}
