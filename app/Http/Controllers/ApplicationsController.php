<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Classes;
use App\Models\Kids;
use App\Models\Languages;
use App\Models\SchoolLanguage;
use App\Models\schools;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return 'siema';
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create(int $school_id,int $class_id)
    {
        return view('applications.add',[
            'school'=>schools::find($school_id),
            'class'=>Classes::find($class_id),
            'languages'=>SchoolLanguage::join('languages','school_languages.language_id','=','languages.id')
                ->get(['languages.name','school_languages.school_id','languages.id'])
                ->where('school_id','=',$school_id),
            'kids'=>Kids::all()->where('user_id','=',Auth::user()->id)
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,int $school,int $class)
    {
        $request->validate([]);
        $app= new Applications();
        $app->kid_id=$request->kid;
        $app->class_id=$class;
        $app->unlock=0;
        $app->exam_points=0;
        $app->certificate_points=0;
        $app->bonus_points=0;
        $app->language_id=$request->language;
        if(isset($request->info1)){
            $app->info1=1;
        }else{
            $app->info1=0;
        }
        if(isset($request->info2)){
            $app->info2=1;
        }else{
            $app->info2=0;
        }
        if(isset($request->info3)){
            $app->info3=1;
        }else{
            $app->info3=0;
        }
        $randomString = Str::random(30);
        $hash=Hash::make($randomString);
        $app->password=$hash;
        $app->add_info=$request->add_info;
        $app->save();
        return $randomString;
    }

    public function unlocker()
    {
        return view ('applications.unlocker');
    }
    public function unlock(Request $request)
    {
        $request->validate([
            'id'=>'exists:applications'
        ]);
        $app = Applications::find($request->id);
        if(Hash::check($request->pass,$app->password)){
            $app->unlock=1;
            $app->save();
            return redirect()->back();
        }
        return 'Błędne hasło';
    }

    /**
     * Display the specified resource.
     */
    public function show(Applications $applications)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Applications $applications)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Applications $applications)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Applications $applications)
    {
        //
    }
}
