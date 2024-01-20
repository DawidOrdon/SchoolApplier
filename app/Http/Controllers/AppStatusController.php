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
}
