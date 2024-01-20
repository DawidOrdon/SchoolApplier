<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidController extends Controller
{
    public static function GetAlias()
    {
        return([
            "first_name" => "imie",
            "secodn_name" => "drugie imie",
            'last_name'=>'nazwisko',
            'phone'=>'numer telefonu',
            'zipconde'=>'kod pocztowy',
            'post'=>'nazwa poczty',
            'address'=>'adres',
            'city'=>'miasto',
            'commune'=>'gmina',
            'county'=>'powiat',
            'voivodeship'=>'województwo',
            'kid'=>'dziecko',
            'choice'=>'wybór',
            'language'=>'język',
            'add_info'=>'dodatkowe informacje',
            'pl'=>'język polski',
            'fl'=>'język obcy',
            'mat'=>'matematyka',
            'rating'=>'oceny',
            'strip'=>'pasek',
            'vol'=>'volontariat',
            'add_1'=>'aktywność',
            'add_2'=>'aktywność',
            'add_3'=>'aktywność',
            'add_4'=>'aktywność',
            'add_5'=>'aktywność',
            'class_name'=>'nazwa klasy',
            'desc'=>'opis',
            'slots'=>'miejsca',
            'subject1'=>'przedmiot',
            'subject2'=>'przedmiot',
            'school_type'=>'typ szkoły',
            'subjects'=>'przedmiot',
            'exam_pl'=>'język polski',
            'exam_fl'=>'język obcy',
            'exam_mat'=>'matematyka',
            'birth_date'=>'data urodzenia',
            'school_number'=>'numer szkoły',
            'school_city'=>'miasto szkoły',
            'school_commune'=>'gmina szkoły',
            'school_voivodeship'=>'województow szkoły',
        ]);
    }
    public static function GetComment()
    {
        return([
            "min" => "Pole :attribute jest mniejze niz :min znaki",
            "max" => "Pole :attribute jest większe niz :max znaki",
            "digits" => "Pole :attribute musi mieć :digits znaków",
            'required'=>'Pole :attribute jest wymagane',
            'alpha'=>'Pole :attribute musi być typu alfanumerycznego',
            'numeric'=>'Pole :attribute musi składać się z liczb',
            "exists" => "Pole :attribute jest nieprawidłowe",
            "equals" => "Pole :attribute musi być równe",
            "between" => "Pole :attribute musi być pomiędzy :min i :max",
            'regex'=>'Pole :attribute musi być według konkretnego schematu'
        ]);
    }
}
