<?php

namespace App\Http\Controllers;

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
use Illuminate\Support\Str;

class ApplicationsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $apps = Applications::join('kids','kids.id','=','applications.kid_id')
                            ->join('users','users.id','=','kids.user_id')
                            ->join('classes','classes.id','=','applications.class_id')
                            ->join('schools','schools.id','=','classes.school_id')
                            ->get(['users.id as user_id','applications.id','schools.name as school_name','classes.name as class_name'])
                            ->where('user_id','=',Auth::user()->id);
        $data=arr::first($apps)[0];
        return (arr::first($apps));
        return view('applications.my_apps');
    }

    public function tests()
    {
        $id=2;
        $data=Applications::join('kids','kids.id','=','applications.kid_id')
                        ->join('users','users.id','=','kids.user_id')
                        ->join('classes','classes.id','=','applications.class_id')
                        ->join('schools','schools.id','=','classes.school_id')
                        ->join('languages','languages.id','=','applications.language_id')
                        ->join('schools_types','schools_types.id','=','classes.school_id')
                        ->join('second_parents','second_parents.id','=','kids.s_parent')
                        ->get(['applications.id as app_id', 'applications.priority as schoolprioryty','applications.add_info as com',
                            'applications.info1 as info1','applications.info2 as info2','applications.info3 as info3',
                            'schools.name as school_name','schools.img as img',
                            'languages.name as lang_name',
                            'schools_types.name as schooltype',

                            'kids.pesel as pesel','kids.first_name as firstname','kids.second_name as secondname','kids.last_name as lastname','kids.birth_date as birthdate',
                            'kids.address as street','kids.city as city', 'kids.zipcode as zipcode','kids.post as post','kids.commune as commune','kids.county as county','kids.voivodeship as voivodeship',
                            'kids.email as email', 'kids.phone_number as phone','kids.school_number as schoolnumber','kids.school_commune as schoolcommune','kids.school_voivodeship as schoolvoivodeship',
                            'kids.s_parent',

                            'second_parents.first_name as sp_first_name','second_parents.last_name as sp_last_name','second_parents.phone_number as sp_phone','second_parents.email as sp_email',
                            'second_parents.address as sp_street','second_parents.post as sp_post','second_parents.city as sp_city','second_parents.commune as sp_commune',
                            'second_parents.county as sp_county','second_parents.voivodeship as sp_voivodeship',

                            'users.first_name as fp_first_name','users.last_name as fp_last_name','users.phone_number as fp_phone','users.email as fp_email',
                            'users.address as fp_street','users.post as fp_post','users.city as fp_city','users.commune as fp_commune',
                            'users.county as fp_county','users.voivodeship as fp_voivodeship'


                            ])
                        ->where('app_id','=',$id)
        ;
        $data=arr::first($data);
        $data= $data->toArray();
        $dompdf=Pdf::loadView("pdf/template/template1",$data)->setOption(['dpi'=>300])->setPaper('a4');
        return $dompdf->stream();


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
        $request->validate([

        ]);
        $app= new Applications();
        $app->kid_id=$request->kid;
        $app->class_id=$class;
        $app->unlock=0;
        $app->exam_points=0;
        $app->certificate_points=0;
        $app->bonus_points=0;
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

    public function exam_save(Request $request, int $school, int $class, int $app)
    {
        $request->validate([]);
        $points=0;
        $points += $request->pl*0.35;
        $points += $request->fl*0.30;
        $points += $request->mat*0.35;
        $app = Applications::find($app);
        $app->exam_points=$points;
        $app->save();

        return redirect('/schools/'.$school.'/'.$class.'/applications/');
    }
    public function certificate_check(int $school, int $class, int $app)
    {
        //do zabezpieczenia
        $data = Applications::join('kids','kids.id','=','applications.kid_id')
                            ->join('classes','applications.class_id','=','classes.id')
                            ->get(['certificate_photo1','certificate_photo2','applications.id','kids.first_name','kids.last_name','classes.subject1','classes.subject2','kid_id'])
                            ->find($app);

        $data->subjects=kid_subjects::join('subjects','subjects.id','=','kid_subjects.subject_id')
            ->get(['subjects.name','kid_subjects.kid_id','subject_id','value'])
            ->where('kid_id','=',$data->kid_id)
            ->whereIn('subject_id',[1,2,$data->subject1,$data->subject2]);



        return view('applications.certificate',['app'=>$data,
                                                'school_id'=>$school,
                                                'class_id'=>$class,
                                                'app_id'=>$app]);
    }

    public function certificate_save(Request $request, int $school, int $class, int $app)
    {
        $request->validate([]);
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
        $app = Applications::find($app);
        $app->certificate_points=$points;
        $app->save();

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

    public function add_info_save(Request $request, int $school, int $class, int $app)
    {
        $request->validate([]);
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
        $app = Applications::find($app);
        $app->bonus_points=$points;
        $app->save();

        return redirect('/schools/'.$school.'/'.$class.'/applications/');
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
