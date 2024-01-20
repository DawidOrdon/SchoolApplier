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
        $request->validate([
            'first_name'=>'required|min:2|max:13|alpha',
            'last_name'=>'required|min:2|max:51|alpha',
            'phone'=>'required|numeric|digits:9',
            'zipcode'=>'min:5|max:6',
            'post'=>'min:2|max:50',
            'email' => 'required|email',
            'address'=>'min:2|max:100',
            'city'=>'min:2|max:50',
            'commune'=>'min:2|max:50',
            'county'=>'min:2|max:50',
            'voivodeship'=>'min:2|max:20',
        ],ValidController::GetComment(),
            ValidController::GetAlias());

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
    public function edit(int $parent_id)
    {
        $s_parent=SecondParents::find($parent_id);
        if(isset($s_parent->user_id)){
            if($s_parent->user_id==Auth::user()->id){
                return view('second_parents.edit',['parent'=>SecondParents::find($parent_id)]);
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
    public function update(Request $request, int $parent_id)
    {
        $s_parent=SecondParents::find($parent_id);
        if(isset($s_parent->user_id)){
            if($s_parent->user_id==Auth::user()->id){
                $request->validate([]);
                $s_parent->first_name=$request['first_name'];
                $s_parent->email=$request['email'];
                $s_parent->last_name=$request['last_name'];
                $s_parent->phone_number=$request['phone'];
                $s_parent->zipcode=$request['zipcode'];
                $s_parent->post=$request['post'];
                $s_parent->address=$request['address'];
                $s_parent->city=$request['city'];
                $s_parent->commune=$request['commune'];
                $s_parent->county=$request['county'];
                $s_parent->voivodeship=$request['voivodeship'];
                $s_parent->save();
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
    public function destroy(SecondParents $secondParents)
    {
        //
    }
}
