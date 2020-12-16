<?php

namespace App\Http\Controllers;

use App\professionalprofile;
use App\ProfessionalProfileImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfessionalController extends Controller
{
    public function bookings(){
        return view('professional-dashboard.bookings');
    }

    public function favourites(){
        return view('professional-dashboard.favourites');
    }

    public function chats(){
        return view('professional-dashboard.chats');
    }

    public function profile(){
        $user = User::where('id', Session::get('userId'))->first();
        $user->profile = professionalprofile::where('user_id', $user->id)->first();
        $user->images = ProfessionalProfileImage::where('user_id', $user->id)->get();
        return view('professional-dashboard.profile')->with(['user' => $user]);
    }

    public function searchResult(Request $request){
        $professional = professionalprofile::where('id', '!=' ,0);
        if (!empty($request->serviceType)){
            $professional->where('service_type', $request->serviceType);
        }
        if (!empty($request->area)){
            $professional->where('area', $request->area);
        }
        if (!empty($request->language)){
            $professional->where('language', $request->language);
        }
        if (!empty($request->min)){
            $professional->where('price','>=',intval($request->min));
        }
        if (!empty($request->max)){
            $professional->where('price','<=',intval($request->max));
        }
        $professional = $professional->get();
        foreach ($professional as $item){
            $item->user = User::where('id', $item->user_id)->first();
            $item->images = ProfessionalProfileImage::where('user_id', $item->user_id)->get();
        }
        return view('landing.search-results')->with(['professionals' => $professional, 'filters' => $request]);
    }
}
