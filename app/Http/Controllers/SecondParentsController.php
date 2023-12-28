<?php

namespace App\Http\Controllers;

use App\Models\SecondParents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SecondParentsController extends Controller
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
        return view('second_parents.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([]);
        $user = Auth::user();
        $sparent = new SecondParents();
        $sparent->user_id=$user->id;
        $sparent->first_name=$request['first_name'];
        $sparent->email=$request['email'];
        $sparent->last_name=$request['last_name'];
        $sparent->phone_number=$request['phone'];

        if($request->address_data){
            $sparent->zipcode=$user->zipcode;
            $sparent->post=$user->post;
            $sparent->address=$user->address;
            $sparent->city=$user->city;
            $sparent->commune=$user->commune;
            $sparent->county=$user->county;
            $sparent->voivodeship=$user->voivodeship;
        }
        else{
            $sparent->zipcode=$request['zipcode'];
            $sparent->post=$request['post'];
            $sparent->address=$request['address'];
            $sparent->city=$request['city'];
            $sparent->commune=$request['commune'];
            $sparent->county=$request['county'];
            $sparent->voivodeship=$request['voivodeship'];
        }
        $sparent->save();
        return redirect('user');
    }

    /**
     * Display the specified resource.
     */
    public function show(SecondParents $secondParents)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SecondParents $secondParents)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SecondParents $secondParents)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SecondParents $secondParents)
    {
        //
    }
}
