<?php

namespace App\Http\Controllers;

use App\Models\SchoolLanguage;
use App\Models\schools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class SchoolLanguageController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,int $school_id)
    {
        $user=Auth::user();
        if(isset($user))
        {
            if( $user->hasPermissionTo('edit_school_data') ) {
                $school = schools::all()->where('user_id','=',$user->id)->where('id','=',$school_id);
                if(count($school)){
                    foreach ($request->lang as $language){
                        $lang = new SchoolLanguage();
                        $lang->school_id=$school_id;
                        $lang->language_id=$language;
                        $lang->save();
                    }
                    return redirect('schools/'.$school_id.'/admin');
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
     * Display the specified resource.
     */
    public function show(SchoolLanguage $schoolLanguage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SchoolLanguage $schoolLanguage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SchoolLanguage $schoolLanguage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $school_id,Request $request)
    {
        $request->validate([
            'lang_id' => [
                'required',
                Rule::exists('languages', 'id')
            ],
        ],ValidController::GetComment(),
            ValidController::GetAlias());
        $lang_id=$request->lang_id;
        $user=Auth::user();
        if(isset($user)) {
            if ($user->hasPermissionTo('edit_school_data')){
                $lang = SchoolLanguage::all()->where('school_id','=',$school_id)->where('id','=',$lang_id);
                if (count($lang)) {
                    SchoolLanguage::destroy($lang_id);
                }
                return redirect('schools/'.$school_id.'/admin');
            }
            return redirect('schools/'.$school_id.'/admin');
        }
        return redirect('schools/'.$school_id.'/admin');
    }

}
