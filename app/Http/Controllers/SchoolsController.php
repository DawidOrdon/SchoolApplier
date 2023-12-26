<?php

namespace App\Http\Controllers;

use App\Models\Classes;
use App\Models\schools;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class SchoolsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('schools.index',['schools'=>Schools::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user=Auth::user();
        if(isset($user))
        {
            if( $user->hasPermissionTo('add_school') ) {
                return view('schools.create',['emails'=>User::get('email')]);
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user=Auth::user();
        if(isset($user))
        {
            if( $user->hasPermissionTo('add_school') ) {
                $request->validate([
                    'school_name'=>'required',
                    'image' => 'required',
                    'admin'=>'required|exists:users,email'
                ]);
                $school = new schools();
                $school->name=$request['school_name'];
                $school->email=$request['email'];
                $school->page=$request['url'];
                $school->phone=$request['phone'];
                $school->address=$request['address'];
                $school->city=$request['city'];
                $school->desc=$request['desc'];
                $school->county=$request['county'];
                $school->voivodeship=$request['voivodeship'];
                $imageName = time().'.'.$request->image->extension();
                $school->img=$imageName;
                $admin_cos=User::all()->where('email','=',$request['admin']);
                foreach ($admin_cos as $admin){
                    $admin_id=$admin;
                }
                if(isset($admin))
                {
                    $school->user_id=$admin->id;
                    $saved = $school->save();
                    if(!$saved){
                        App::abort(500, 'Error');
                    }
                    else
                    {
                        $request->image->move(public_path('images\schools'), $imageName);
                        User::find($admin_id->id)->assignrole('school');
                    }
                    return redirect('/');
                }
                else{
                    return redirect('/');
                }
            }
            else{
                return redirect('/');
            }
        }
        else{
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(schools $schools)
    {
        return"detale skoly";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(schools $schools, int $school_id)
    {
        $user=Auth::user();
        if(isset($user))
        {
            if( $user->hasPermissionTo('edit_school_data') ) {
                $school = schools::all()->where('user_id','=',$user->id)->where('id','=',$school_id);
                if(count($school)){
                    return view('schools.edit_form',['emails'=>User::get('email'),'schools'=>Schools::all()->where('user_id','=',$user->id)]);
                }
                else{
                    return redirect('/');
                }
            }
            return redirect('/');
        }
        return redirect('/');
    }

    public function admin_page(int $school_id)
    {
        $user=Auth::user();
        if(isset($user))
        {
            if( $user->hasPermissionTo('edit_school_data') ) {
                $school = schools::all()->where('user_id','=',$user->id)->where('id','=',$school_id);
                if(count($school)){
                    return view('schools.admin',['schools'=>Schools::all()->where('user_id','=',$user->id),'classes'=>Classes::all()->where('school_id','=',$school_id)]);
                }
                else{
                    return redirect('/');
                }
            }
            return redirect('/');
        }
        return redirect('/');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, schools $schools)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(schools $schools)
    {
        //
    }
}
