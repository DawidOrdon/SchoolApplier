<?php

namespace App\Http\Controllers;

use App\Models\Kids;
use App\Models\SecondParents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index',[
            'user'=>Auth::user(),
            'second_parents'=>SecondParents::all()->where('user_id','=',Auth::user()->id),
            'kids'=>Kids::all()->where('user_id','=',Auth::user()->id)
        ]);
    }
    public function edit()
    {
        return view('users.edit',['user'=>Auth::user()]);
    }
    public function update(Request $request)
    {
        $request->validate([
            'first_name'=>'required|min:2|max:13|alpha',
            'last_name'=>'required|min:2|max:51|alpha',
            'phone'=>'required|numeric|digits:9',
            'zipcode'=>'required|min:5|max:6',
            'post'=>'required|min:2|max:50',
            'address'=>'required|min:2|max:100',
            'city'=>'required|min:2|max:50',
            'commune'=>'required|min:2|max:50',
            'county'=>'required|min:2|max:50',
            'voivodeship'=>'required|min:2|max:20',
        ],[
            "min" => "Pole :attribute jest mniejze niz :min",
            "last_name.min" => "Pole :attribute jest spoko"
        ],[
            "first_name" => "imie"
        ]);
        $user=User::find(Auth::user()->id);
        $user->first_name=$request['first_name'];
        $user->last_name=$request['last_name'];
        $user->phone_number=$request['phone'];
        $user->zipcode=$request['zipcode'];
        $user->post=$request['post'];
        $user->address=$request['address'];
        $user->city=$request['city'];
        $user->commune=$request['commune'];
        $user->county=$request['county'];
        $user->voivodeship=$request['voivodeship'];
        $user->save();
        return redirect('user');
    }
}
