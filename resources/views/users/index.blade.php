@include('navbar.main')
<div class="grid md:grid-cols-4 place-items-stretch">
    <div class="flex items-center justify-center w-full col-start-2" style="text-align: center">
        Moje dane <br />
    </div>
    <div class="flex items-center justify-center w-full col-start-3" >
            <table>
                <tr>
                    <td>Imie i nazwisko:</td><td>{{$user->first_name}} {{$user->last_name}}</td>
                </tr>
                <tr>
                    <td>adres:</td><td>{{$user->address}}</td>
                </tr>
                <tr>
                    <td>numer telefonu:</td><td>{{$user->phone_number}}</td>
                </tr>
                <tr>
                    <td>Miasto, gmina</td><td>{{$user->city}},{{$user->commune}}</td>
                </tr>
                <tr>
                    <td>Kod pocztowy poczta</td><td>{{$user->zipcode}}/{{$user->post}}</td>
                </tr>
                <tr>
                    <td>Powiat Województwo</td><td>{{$user->county}} {{$user->voivodeship}}</td>
                </tr>

            </table>
            <h2></h2><br />

    </div>
</div>
<div class="flex items-center justify-center w-full">
    Dane Drugiego rodzica
    <a href="{{route('second_parent.create')}}"><button class="btn">Dodaj 2 rodzica/opiekuna</button></a><br />
    @foreach($second_parents as $second_parent)
        <a href="{{route('second_parent.edit',$second_parent->id)}}"><button class="btn">{{$second_parent->first_name}}</button></a><br />
    @endforeach
</div>
<div class="flex items-center justify-center w-full">
    Dane dziecka
</div>

@include('footer.main')
