<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class PDFController extends Controller
{
    static public function createPDF(string $id, string $password)
    {
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
        $data['id']=$id;
        $data['password']=$password;
        $dompdf=Pdf::loadView("pdf/template/template1",$data)->setOption(['dpi'=>300])->setPaper('a4');
        return $dompdf;
    }
}
