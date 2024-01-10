<!doctype html>
<html lang="PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Document</title>
    <style>
        @font-face {
            font-family: "Calibri Sans Serif";
            font-style: normal;
            font-weight: normal;
        }
        * {
            font-family: "Dojo Sans Serif", "DejaVu Sans", sans-serif;
        }
        body{
            font-family: Calibri, serif;
            width: 2200px;
            font-size: 35px;
        }
        .logo{
            width: 1100px;
            height: 250px;
            float: left;
        }
        .logo img{
            height: 240px;
        }
        .date{
            width: 1100px;
            float: left;
            text-align: right;
            height: 250px;
        }
        .nav-text
        {
            width: 2200px;
            text-align: center;
        }
        table{
            width: 2200px;
        }
        .table-nav{
            text-align: left;
        }
        td{
            width: 50%;
        }
        .additionaldata .first-td{
            width: 2000px;
        }
        .codes{
            float:left;
            width: 50%;
        }

    </style>
</head>
<body>
<div class="logo">
    <img src="data:image/png;base64,{{ base64_encode(file_get_contents(public_path('images/schools/'.$img))) }}" alt="">
</div>
<div class="date">
    Wronki, dnia{{now()}}
</div>
<div class="nav-text">
    <h3>WNIOSEK O PRZYJĘCIE KANDYDATA</h3>
    {{$school_name}}<br>
    na rok szkolny 2023/2024
</div>
<div class="schooltype">
    <table>
        <tr><td colspan="2" class="table-nav"><h3>Kierunek nauki</h3></td></tr>
        <tr><td>Rodzaj szkoły: {{$schooltype}}</td><td>jest to mój {{$schoolprioryty}} wybór</td></tr>
        <tr><td>Chciałbym/Chciałabym kontynuować:</td><td>Język angielski</td></tr>
    </table>
</div>
<div>
    <table>
        <tr><td colspan="2"> <h3>Dane personalne</h3></td></tr>
        <tr>
            <td colspan="2">Pesel: {{$pesel}}</td>
        </tr>
        <tr>
            <td>Imię (imiona): {{$firstname}} {{$secondname}}</td><td>Nazwisko: {{$lastname}}</td>
        </tr>
    </table>
    <table>
        <tr><td colspan="2"> <h3>Dane kontaktowe ucznia</h3></td></tr>
        <tr>
            <td colspan="2">ulica {{$street}}</td>
        </tr>
        <tr>
            <td>Miejscowość: {{$city}}</td><td>kod pocztowy: {{$zipcode}}</td>
        </tr>
        <tr>
            <td>Poczta: {{$post}}</td><td>Gmina: {{$commune}}</td>
        </tr>
        <tr>
            <td>Powiat: {{$county}}</td><td>Województwo: {{$voivodeship}}</td>
        </tr>
        <tr>
            <td>adres e-mail: {{$email}}</td><td>tel kontaktowy: {{$phone}}</td>
        </tr>
        <tr>
            <td colspan="2" style="height: 100px">Kończę/ukończyłem Szkołę Podstawową nr. {{$schoolnumber}} w gminie {{$schoolcommune}} w województwie {{$schoolvoivodeship}} </td>
        </tr>
    </table>
</div>
<div class="parentsdata">
    <table>
        <tr><td colspan="2"> <h3>Dane rodziców/ prawnych opiekunów</h3></td></tr>
        <tr>
            <td>Pierwszy rodzic/opiekun prawny</td><td>Drugi rodzic/opiekun prawny</td>
        </tr>
        <tr>
            <td>Imię i nazwisko: {{$fp_first_name}} {{$fp_last_name}}</td><td>Imię i nazwisko: {{$sp_first_name}} {{$sp_last_name}}</td>
        </tr>
        <tr>
            <td>Tel: {{$fp_phone}}</td><td>Tel: {{$sp_phone}}</td>
        </tr>
        <tr>
            <td>E-mail: {{$fp_email}}</td><td>E-mail: {{$sp_email}}</td>
        </tr>
        <tr>
            <td>Adres: {{$fp_street}}</td><td>Adres: {{$sp_street}}</td>
        </tr>
        <tr>
            <td>Poczta: {{$fp_post}}</td><td>Poczta: {{$sp_post}}</td>
        </tr>
        <tr>
            <td>Miejscowość: {{$fp_city}}</td><td>Miejscowość: {{$sp_city}}</td>
        </tr>
        <tr>
            <td>Gmina: {{$fp_commune}}</td><td>Gmina: {{$sp_commune}}</td>
        </tr>
        <tr>
            <td>Powiat: {{$fp_county}}</td><td>Powiat: {{$sp_county}}</td>
        </tr>
        <tr>
            <td>Województwo: {{$fp_voivodeship}}</td><td>Województwo: {{$sp_voivodeship}}</td>
        </tr>

    </table>
</div>
<div class="additionaldata">
    <table>
        <tr>
            <td colspan="2"><h3>DODATKOWE INFORMACJE O KANDYDACIE</h3> </td>
        </tr>
        <tr>
            <td class="first-td">Posiadam orzeczenie o stopniu niepełnosprawności wydane przez Powiatowy Zespół do Spraw Orzekania o Niepełnosprawności</td>
            <td>
                @if($info1)
                    x
                @endif
            </td>
        </tr>
        <tr>
            <td class="first-td">Posiadam opnię Poradni Psychologiczno - Pedagogicznej </td>
            <td>
                @if($info2)
                    x
                @endif
            </td>
        </tr>
        <tr>
            <td class="first-td">Posiadam orzeczenie Poradni Psychologiczno-Pedagogicznej  </td>
            <td>
                @if($info3)
                    x
                @endif
            </td>
        </tr>
    </table>
    <table style="margin-top: 50px">
        <tr>
            <td style="width: 40%;">Informacje o stanie zdrowia kandydata <br />(np. choroby przewlekłe, cukrzyca, epilepsja, aleregia i inne)</td><td>{{$com}}</td>
        </tr>
    </table>
    <div class="codes">
        {!! DNS1D::getBarcodeHTML($id, 'C39',4,60); !!}
        id:{{$id}}
    </div>
    <div class="codes">
        {!! DNS1D::getBarcodeHTML($password, 'C39',4,60); !!}
        password:{{$password}}
    </div>

</div>
</body>
</html>
