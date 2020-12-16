<?php

namespace App\Http\Controllers;

use App\professionalprofile;
use App\ProfessionalProfileImage;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Customer extends Controller
{
//    public function bookings(){
//        return view('professional-dashboard.bookings');
//    }

    public function favourites(){
        return view('customer-dashboard.favourite');
    }

//    public function chats(){
//        return view('professional-dashboard.chats');
//    }

    public function profile(){
        $user = User::where('id', Session::get('userId'))->first();
        return view('customer-dashboard.profile')->with(['user' => $user]);
    }
}
