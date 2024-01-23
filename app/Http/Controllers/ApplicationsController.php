<?php

namespace App\Http\Controllers;

use App\Http\Controllers\PDFController;
use App\Models\Applications;
use App\Models\Classes;
use App\Models\kid_subjects;
use App\Models\Kids;
use App\Models\Languages;
use App\Models\SchoolLanguage;
use App\Models\schools;
use App\Models\Subjects;
use Barryvdh\DomPDF\Facade\Pdf;
use Dompdf\Dompdf;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class ApplicationsController extends Controller
{

    public function index()
    {
        $apps = Applications::join('kids','kids.id','=','applications.kid_id')
                            ->join('users','users.id','=','kids.user_id')
                            ->join('classes','classes.id','=','applications.class_id')
                            ->join('schools','schools.id','=','classes.school_id')
                            ->join('app_statuses','applications.status_id','=','app_statuses.id')
                            ->get(['users.id as user_id',
                                'applications.id as id',
                                'schools.name as school_name',
                                'classes.name as class_name',
                                'app_statuses.name as status',
                                'kids.first_name as first_name','kids.last_name as last_name'])
                            ->where('user_id','=',Auth::user()->id);
//        return ($apps);
        return view('applications.my_apps',['apps'=>$apps]);
    }

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

    public function store(Request $request,int $school,int $class)
    {
        $request->validate([
            'kid' => [
                'required',
                Rule::exists('kids', 'id')->where(function ($query) {
                    $query->where('user_id', auth()->id());
                }),
            ],
            'choice'=>'required',
            'language' => [
                'required',
                Rule::exists('languages', 'id'),
            ],
            'add_info'=>'max:255'
        ],ValidController::GetComment(),
            ValidController::GetAlias());

        if(count(Applications::all()->where('class_id','=',$class)->where('kid_id','=',$request->kid)))
        {
            return redirect()->back()->withErrors(['msg' => 'Dla tego dziecka zostało już stworzone podanie']);
        }
        session_start();
        if(isset($_SESSION['kid_id'])&&$_SESSION['kid_id']==$request->kid&&isset($_SESSION['class'])&&$_SESSION['class']==$class)
        {

            $pdf=PDFController::createPDF($_SESSION['id'],$_SESSION['password']);
        }else{
            $app= new Applications();
            $app->kid_id=$request->kid;
            $app->class_id=$class;
            $app->unlock=0;
            $app->status_id=1;
            $app->priority=$request->choice;
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
            $randomString = Str::random(10);
            $hash=Hash::make($randomString);
            $app->password=$hash;
            $app->add_info=$request->add_info;
            $app->save();
            $_SESSION['password']=$randomString;
            $_SESSION['id']=$app->id;
            $_SESSION['kid_id']=$app->kid_id;
            $_SESSION['class']=$app->class_id;
            $pdf=PDFController::createPDF($_SESSION['id'],$_SESSION['password']);
        }

        return $pdf->stream();
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
            $app->status_id=2;
            $app->save();
            return redirect()->back();
        }
        Session::flash('unlock_success', 'Podanie zostało odblokowane.');
        return 'Błędne hasło';
    }

    public function exam_check(int $school, int $class, int $app)
    {
        //do zabezpieczenia
        $data = Applications::join('kids','kids.id','=','applications.kid_id')
                            ->get(['exam_photo','applications.id','kids.exam_pl','kids.exam_fl','kids.exam_mat','kids.first_name','kids.last_name'])
                            ->find($app);

//        return $data;
        return view('applications.exam',['app'=>$data,
                                                'school_id'=>$school,
                                                'class_id'=>$class,
                                                'app_id'=>$app]);
    }

    public function exam_save(Request $request, int $school, int $class, int $app_id)
    {
        $request->validate([
            'pl' =>'required|min:0|max:100|numeric',
            'fl' =>'required|min:0|max:100|numeric',
            'mat' =>'required|min:0|max:100|numeric',

        ],ValidController::GetComment(),
            ValidController::GetAlias());

        $points=0;
        $points += $request->pl*0.35;
        $points += $request->fl*0.30;
        $points += $request->mat*0.35;
        $app = Applications::find($app_id);
        $app->exam_points=$points;
        $app->save();

        AppStatusController::verify_point_status($app_id);
        return redirect('/schools/'.$school.'/'.$class.'/applications/');
    }
    public function certificate_check(int $school, int $class, int $app)
    {
        $data = Applications::join('kids','kids.id','=','applications.kid_id')
                            ->join('classes','applications.class_id','=','classes.id')
                            ->get(['certificate_photo1','certificate_photo2','applications.id','kids.first_name','kids.last_name','classes.subject1','classes.subject2','kid_id'])
                            ->find($app);

        $kidId=$data->kid_id;
        $data->subjects= Subjects::leftJoin('kid_subjects', function ($join) use ($kidId) {
            $join->on('subjects.id', '=', 'kid_subjects.subject_id')
                ->where('kid_subjects.kid_id', '=', $kidId);
        })
            ->whereIn('subjects.id', [1, 2, $data->subject1, $data->subject2])
            ->get(['subjects.name', 'subjects.id as subject_id', 'kid_subjects.value', 'kid_subjects.kid_id as kid_id']);



        return view('applications.certificate',['app'=>$data,
                                                'school_id'=>$school,
                                                'class_id'=>$class,
                                                'app_id'=>$app]);
    }

    public function certificate_save(Request $request, int $school, int $class, int $app_id)
    {
        $request->validate([
            'rating.*'=> 'required|integer|between:1,6',
        ],ValidController::GetComment(),
            ValidController::GetAlias());
        $points=0;
        foreach ($request->rating as $rating){
            switch($rating){
                case 6:{
                    $points+=18;
                    break;
                }
                case 5:{
                    $points+=17;
                    break;
                }
                case 4:{
                    $points+=14;
                    break;
                }
                case 3:{
                    $points+=8;
                    break;
                }
                case 2:{
                    $points+=2;
                    break;
                }
            }
        }
        $app = Applications::find($app_id);
        $app->certificate_points=$points;
        $app->save();

        AppStatusController::verify_point_status($app_id);
        return redirect('/schools/'.$school.'/'.$class.'/applications/');
    }
    public function add_info_check(int $school, int $class, int $app)
    {
        //do zabezpieczenia
        $data = Applications::join('kids','kids.id','=','applications.kid_id')
                            ->join('classes','applications.class_id','=','classes.id')
                            ->get(['certificate_photo1','certificate_photo2','applications.id','kids.first_name','kids.last_name','kid_id'])
                            ->find($app);

        return view('applications.add_info',['app'=>$data,
                                                'school_id'=>$school,
                                                'class_id'=>$class,
                                                'app_id'=>$app]);
    }

    public function add_info_save(Request $request, int $school, int $class, int $app_id)
    {
        $request->validate([
            'strip'=> 'integer|in:7',
            'vol'=> 'integer|in:3',
            'add_1'=> 'integer||between:5,10',
            'add_2'=> 'integer||between:3,10',
            'add_3'=> 'integer||between:3,10',
            'add_4'=> 'integer||between:2,10',
            'add_5'=> 'integer||between:1,4',
        ],ValidController::GetComment(),
            ValidController::GetAlias());

        $points=0;
        $points+=$request->strip;
        $points+=$request->vol;
        $add_points=0;
        $add_points+=$request->add_1;
        $add_points+=$request->add_2;
        $add_points+=$request->add_3;
        $add_points+=$request->add_4;
        $add_points+=$request->add_5;
        if($add_points>18){
            $add_points=18;
        }
        $points+=$add_points;
        $app = Applications::find($app_id);
        $app->bonus_points=$points;
        $app->save();

        AppStatusController::verify_point_status($app_id);
        return redirect('/schools/'.$school.'/'.$class.'/applications/');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'id' => [
                'required',
                Rule::exists('applications', 'id')->where(function ($query) {
                    $query->join('kids','kids.id','=','applications.kid_id')->get('kids.user_id as user_id')->where('user_id', auth()->id());
                    session_start();
                    unset($_SESSION['kid_id']);
                    unset($_SESSION['class']);
                }),
            ],
        ],ValidController::GetComment(),
            ValidController::GetAlias());

        Applications::destroy($request->id);
        return redirect()->back();
    }
    public function new_pdf(Request $request)
    {
        $request->validate([
            'id' => [
                'required',
                Rule::exists('applications', 'id')->where(function ($query) {
                    $query->join('kids','kids.id','=','applications.kid_id')->get('kids.user_id as user_id')->where('user_id', auth()->id());
                }),
            ],
        ],ValidController::GetComment(),
            ValidController::GetAlias());
        $pdfcontroller = new PDFController();
        $randomString = Str::random(10);
        $hash=Hash::make($randomString);
        $app=Applications::find($request->id);
        $app->password=$hash;
        $app->save();


        $pdf=$pdfcontroller->createPDF($app->id,$randomString);
        return $pdf->stream();
    }
}
