<?php

namespace App\Http\Controllers;

use App\Models\kid_subjects;
use App\Models\Kids;
use App\Models\SecondParents;
use App\Models\Subjects;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KidsController extends Controller
{

    public function create()
    {
        return view('kids.create',['parents'=>SecondParents::all()->where('user_id','=',Auth::user()->id)]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required|min:2|max:13|alpha',
            'second_name'=>'required|min:2|max:13|alpha',
            'last_name'=>'required|min:2|max:51|alpha',
            'pesel' => [
                'required',
                'regex:/^[0-9]{11}$/',
            ],
            'birth_date'=>'required|date|before_or_equal:today|date_format:Y-m-d',
            'school_number'=>'required|numeric',
            'phone'=>'required|numeric|digits:9',
            'zipcode'=>'min:5|max:6',
            'post'=>'min:2|max:50',
            'email' => 'required|email',
            'address'=>'min:2|max:100',
            'city'=>'min:2|max:50',
            'school_city'=>'required|min:2|max:50',
            'commune'=>'min:2|max:50',
            'school_commune'=>'required|min:2|max:50',
            'county'=>'min:2|max:50',
            'voivodeship'=>'min:2|max:20',
            'school_voivodeship'=>'required|min:2|max:20',
        ],ValidController::GetComment(),
            ValidController::GetAlias());
        $kid = new Kids();
        $user=Auth::user();
        $kid->user_id=$user->id;
        $kid->first_name=$request['first_name'];
        $kid->second_name=$request['second_name'];
        $kid->last_name=$request['last_name'];
        $kid->pesel=$request['pesel'];
        $kid->birth_date=$request['birth_date'];
        $kid->school_number=$request['school_number'];
        $kid->school_city=$request['school_city'];
        $kid->school_commune=$request['school_commune'];
        $kid->school_voivodeship=$request['school_voivodeship'];
        $kid->email=$request['email'];
        $kid->phone_number=$request['phone'];
        $kid->s_parent=$request['s_parent'];

        if($request->address_data){
            $kid->zipcode=$user->zipcode;
            $kid->post=$user->post;
            $kid->address=$user->address;
            $kid->city=$user->city;
            $kid->commune=$user->commune;
            $kid->county=$user->county;
            $kid->voivodeship=$user->voivodeship;
        }
        else{
            $kid->zipcode=$request['zipcode'];
            $kid->post=$request['post'];
            $kid->address=$request['address'];
            $kid->city=$request['city'];
            $kid->commune=$request['commune'];
            $kid->county=$request['county'];
            $kid->voivodeship=$request['voivodeship'];
        }
        $kid->save();
        return redirect('user');

    }

    /**
     * Display the specified resource.
     */
    public function show(Kids $kids)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $kid_id)
    {
        $kid=Kids::find($kid_id);
        if(isset($kid->user_id)){
            if($kid->user_id==Auth::user()->id){
                return view('kids.edit',['kid'=>Kids::find($kid_id)]);
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
    public function update(Request $request, int $kid_id)
    {
        $kid=Kids::find($kid_id);
        if(isset($kid->user_id)){
            if($kid->user_id==Auth::user()->id){
                $request->validate([
                    'first_name'=>'required|min:2|max:13|alpha',
                    'second_name'=>'required|min:2|max:13|alpha',
                    'last_name'=>'required|min:2|max:51|alpha',
                    'pesel' => [
                        'required',
                        'regex:/^[0-9]{11}$/',
                    ],
                    'birth_date'=>'required|date|before_or_equal:today|date_format:Y-m-d',
                    'school_number'=>'required|numeric',
                    'phone'=>'required|numeric|digits:9',
                    'zipcode'=>'required|min:5|max:6',
                    'post'=>'required|min:2|max:50',
                    'address'=>'required|min:2|max:100',
                    'city'=>'required|min:2|max:50',
                    'school_city'=>'required|min:2|max:50',
                    'commune'=>'required|min:2|max:50',
                    'school_commune'=>'required|min:2|max:50',
                    'county'=>'required|min:2|max:50',
                    'voivodeship'=>'required|min:2|max:20',
                    'school_voivodeship'=>'required|min:2|max:20',
                ],ValidController::GetComment(),
                    ValidController::GetAlias());

                $kid = Kids::find($kid_id);
                $user=Auth::user();
                $kid->user_id=$user->id;
                $kid->first_name=$request['first_name'];
                $kid->second_name=$request['second_name'];
                $kid->last_name=$request['last_name'];
                $kid->pesel=$request['pesel'];
                $kid->birth_date=$request['birth_date'];
                $kid->school_number=$request['school_number'];
                $kid->school_city=$request['school_city'];
                $kid->school_commune=$request['school_commune'];
                $kid->school_voivodeship=$request['school_voivodeship'];
                $kid->email=$request['email'];
                $kid->phone_number=$request['phone'];
                $kid->zipcode=$request['zipcode'];
                $kid->post=$request['post'];
                $kid->address=$request['address'];
                $kid->city=$request['city'];
                $kid->commune=$request['commune'];
                $kid->county=$request['county'];
                $kid->voivodeship=$request['voivodeship'];

                $kid->save();
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

    public function exam_add(int $kid_id)
    {
        //zabezpieczenie przed ponownym wysłaniem wyników egzaminu
//        if(!is_null(Kids::find($kid_id)->exam_pl)){
//            return redirect('user');
//        }
        return view('kids.exam',['kid'=>Kids::find($kid_id)]);
    }
    public function exam_store(Request $request, int $kid_id)
    {
        $kid=Kids::find($kid_id);
        if(isset($kid->user_id)){
            if($kid->user_id==Auth::user()->id){
                $request->validate([
                    'exam_pl'=>'required|numeric|between:1,100',
                    'exam_fl'=>'required|numeric|between:1,100',
                    'exam_mat'=>'required|numeric|between:1,100',
                ],ValidController::GetComment(),
                    ValidController::GetAlias());
                $kid->exam_pl=$request->pl;
                $kid->exam_fl=$request->fl;
                $kid->exam_mat=$request->mat;
                $imageName = time().'.'.$request->image->extension();
                $kid->exam_photo=$imageName;
                $request->image->move(public_path('images\exam'), $imageName);
                $kid->save();
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
    public function certificate_add(int $kid_id)
    {
        //zabezpieczenie przed ponownym wysłaniem wyników świadectwa
//        if(Kids::find($kid_id)->certificate_fill!=0)){
//            return redirect('user');
//        }
        return view('kids.certificate',['kid'=>Kids::find($kid_id),'subjects'=>Subjects::all()]);
    }
    public function certificate_store(Request $request, int $kid_id)
    {
        $kid=Kids::find($kid_id);
        if(isset($kid->user_id)){
            if($kid->user_id==Auth::user()->id){
                $request->validate([
                    'subjects.*'=>'required|integer|between:1,6',
                ],ValidController::GetComment(),
                    ValidController::GetAlias());

                //return($request->subjects);
                foreach($request->subjects as $key=>$subject){
                    $k_s = new kid_subjects();
                    $k_s->kid_id = $kid_id;
                    $k_s->subject_id=$key;
                    $k_s->value=$subject;
                    $k_s->save();

                }

                $imageName = time().'.'.$request->image1->extension();
                $kid->certificate_photo1=$imageName;
                $request->image1->move(public_path('images\certificate1'), $imageName);
                $imageName = time().'.'.$request->image2->extension();
                $kid->certificate_photo2=$imageName;
                $request->image2->move(public_path('images\certificate2'), $imageName);
                $kid->save();
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
    public function destroy(Kids $kids)
    {
        //
    }
}
