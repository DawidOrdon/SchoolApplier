<?php

namespace App\Http\Controllers;

use App\Models\Languages;
use App\Models\SchoolLanguage;
use App\Models\schools;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LanguagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(int $school_id)
    {
        return view('languages.add',['school_id'=>$school_id,
                                        'languages'=>SchoolLanguage::rightJoin('languages','school_languages.language_id','=','languages.id')
                                                                    ->get(['school_id','languages.id','languages.name'])
                                                                    ->wherenull('school_id')]);
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
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     */
    public function show(Languages $languages)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Languages $languages)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Languages $languages)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Languages $languages)
    {
        //
    }
}
