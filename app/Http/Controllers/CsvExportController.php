<?php

namespace App\Http\Controllers;

use App\Models\Applications;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use League\Csv\Writer;

class CsvExportController extends Controller
{
    public function exportCsv(Request $request, int $school_id, int $class_id)
    {
        $slots=Classes::find($class_id)->slots;
        $data=Applications::join('kids','kids.id','=','applications.kid_id')
            ->join('users','users.id','=','kids.user_id')
            ->join('classes','classes.id','=','applications.class_id')
            ->join('schools','schools.id','=','classes.school_id')
            ->join('languages','languages.id','=','applications.language_id')
            ->join('schools_types','schools_types.id','=','classes.school_id')
            ->join('second_parents','second_parents.id','=','kids.s_parent')
            ->get([

                'kids.last_name as lastname','kids.first_name as firstname','kids.second_name as secondname','kids.birth_date as birthdate','kids.pesel as pesel','kids.city as city',
                'kids.address as street','kids.zipcode as zipcode','kids.post as post','kids.commune as commune','kids.county as county','kids.voivodeship as voivodeship',
                'kids.phone_number as phone','kids.email as email','schools.name as school_name',


                'applications.id as app_id', 'applications.priority as schoolprioryty','applications.add_info as com',
                'applications.info1 as info1','applications.info2 as info2','applications.info3 as info3',
                'schools.img as img',
                'languages.name as lang_name',
                'schools_types.name as schooltype',



                 'kids.school_number as schoolnumber','kids.school_commune as schoolcommune','kids.school_voivodeship as schoolvoivodeship',
                'kids.s_parent',

                'second_parents.first_name as sp_first_name','second_parents.last_name as sp_last_name','second_parents.phone_number as sp_phone','second_parents.email as sp_email',
                'second_parents.address as sp_street','second_parents.post as sp_post','second_parents.city as sp_city','second_parents.commune as sp_commune',
                'second_parents.county as sp_county','second_parents.voivodeship as sp_voivodeship',

                'users.first_name as fp_first_name','users.last_name as fp_last_name','users.phone_number as fp_phone','users.email as fp_email',
                'users.address as fp_street','users.post as fp_post','users.city as fp_city','users.commune as fp_commune',
                'users.county as fp_county','users.voivodeship as fp_voivodeship',

                'classes.id as class_id'
            ])
            ->take($slots)
            ->where('class_id','=',$class_id)
        ;
//        return $data;

        // Konwertuj dane do tablicy
        $data = $data->toArray();

        // Tworzenie obiektu Writer
        $csv = Writer::createFromString('');
        $csv->setOutputBOM(Writer::BOM_UTF8);

        // Dodawanie nagłówków
        $csv->insertOne([
            'nazwisko',
            'imie',
            'imie2',
            'data_ur',
            'pesel',
            'ADRES_U_miejscowosc',
            'ADRES_U_kod',
            'ADRES_U_poczta',
            'ADRES_U_gmina',
            'ADRES_U_powiat',
            'ADRES_U_woj',
            'ADRES_U_tel',
            'ADRES_U_e_mail',
            'SZKOLA_nazwa'

        ]);

        // Dodawanie danych do pliku CSV
        $csv->insertAll($data);

        // Tworzenie odpowiedzi HTTP z plikiem CSV
        return Response::make($csv->output(), 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="export.csv"',
        ]);
    }
}
