<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\AppStatus;
use Illuminate\Http\Request;

class AppStatusController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    static public function verify_point_status(int $app_id):void
    {
        $verify = Applications::all()->where('id','=',$app_id)
                            ->whereNotNull('exam_points')
                            ->whereNotNull('certificate_points');
        if(count($verify)){
            $app = Applications::find($app_id);
            $app->status_id = 3;
            $app->save();
        }
    }

    public function drop_app(int $app_id)
    {
        $app= Applications::find($app_id);
        $app->status_id=6;
        $app->save();
        return redirect()->back();
    }
    public function restore_app(int $app_id)
    {
        $app= Applications::find($app_id);
        $app->status_id=3;
        $app->save();
        return redirect()->back();
    }
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(AppStatus $appStatus)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AppStatus $appStatus)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AppStatus $appStatus)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AppStatus $appStatus)
    {
        //
    }
}
