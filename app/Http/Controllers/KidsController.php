<?php

namespace App\Http\Controllers;

use App\Models\Kids;
use App\Models\SecondParents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KidsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kids.create',['parents'=>SecondParents::all()->where('user_id','=',Auth::user()->id)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([

        ]);
        $kid = new Kids();
        $user=Auth::user();
        $kid->user_id=$user->id;
        $kid->first_name=$request['first_name'];
        $kid->second_name=$request['second_name'];
        $kid->last_name=$request['last_name'];
        $kid->pesel=$request['pesel'];
        $kid->birth_date=$request['birth_date'];
        $kid->school_number=$request['school_number'];
        $kid->school_city=$request['school_city'];
        $kid->school_commune=$request['school_commune'];
        $kid->school_voivodeship=$request['school_voivodeship'];
        $kid->email=$request['email'];
        $kid->phone_number=$request['phone'];
        $kid->s_parent=$request['s_parent'];
        $kid->certificate_fill=0;

        if($request->address_data){
            $kid->zipcode=$user->zipcode;
            $kid->post=$user->post;
            $kid->address=$user->address;
            $kid->city=$user->city;
            $kid->commune=$user->commune;
            $kid->county=$user->county;
            $kid->voivodeship=$user->voivodeship;
        }
        else{
            $kid->zipcode=$request['zipcode'];
            $kid->post=$request['post'];
            $kid->address=$request['address'];
            $kid->city=$request['city'];
            $kid->commune=$request['commune'];
            $kid->county=$request['county'];
            $kid->voivodeship=$request['voivodeship'];
        }
        $kid->save();
        return redirect('user');

    }

    /**
     * Display the specified resource.
     */
    public function show(Kids $kids)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $kid_id)
    {
        $kid=Kids::find($kid_id);
        if(isset($kid->user_id)){
            if($kid->user_id==Auth::user()->id){
                return view('kids.edit',['kid'=>Kids::find($kid_id)]);
            }
            else{
                return redirect('user');
            }
        }
        else{
            return redirect('user');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, int $kid_id)
    {
        $kid=Kids::find($kid_id);
        if(isset($kid->user_id)){
            if($kid->user_id==Auth::user()->id){
                $request->validate([

                ]);
                $kid = Kids::find($kid_id);
                $user=Auth::user();
                $kid->user_id=$user->id;
                $kid->first_name=$request['first_name'];
                $kid->second_name=$request['second_name'];
                $kid->last_name=$request['last_name'];
                $kid->pesel=$request['pesel'];
                $kid->birth_date=$request['birth_date'];
                $kid->school_number=$request['school_number'];
                $kid->school_city=$request['school_city'];
                $kid->school_commune=$request['school_commune'];
                $kid->school_voivodeship=$request['school_voivodeship'];
                $kid->email=$request['email'];
                $kid->phone_number=$request['phone'];
                $kid->zipcode=$request['zipcode'];
                $kid->post=$request['post'];
                $kid->address=$request['address'];
                $kid->city=$request['city'];
                $kid->commune=$request['commune'];
                $kid->county=$request['county'];
                $kid->voivodeship=$request['voivodeship'];

                $kid->save();
                return redirect('user');
            }
            else{
                return redirect('user');
            }
        }
        else{
            return redirect('user');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kids $kids)
    {
        //
    }
}
