@include('navbar.main')
<div class="grid md:grid-cols-4 place-items-stretch">
    <div class="flex items-center justify-center w-full col-start-2" style="text-align: center">
        <a href="{{url('user/edit')}}">Moje dane </a>
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
<div class="grid md:grid-cols-4 place-items-stretch m-10">
    <div class="flex items-center justify-center w-full col-start-2" style="text-align: center">
        <div class="w-full">Dane Drugiego rodzica </div>
        <div class="w-full"><a href="{{route('second_parent.create')}}"><button class="btn">Dodaj 2 rodzica/opiekuna</button></a></div>
    </div>
    <div class="flex items-center justify-center w-full col-start-3" style="text-align: center">
        @foreach($second_parents as $second_parent)
            <a href="{{route('second_parent.edit',$second_parent->id)}}"><button class="btn">{{$second_parent->first_name}}</button></a><br />
        @endforeach
    </div>
</div>
<div class="grid md:grid-cols-4 place-items-stretch m-10">
    <div class="flex items-center justify-center w-full col-start-2 " style="text-align: center">
        <div class="w-full">Dane dziecka </div>
        <div class="w-full"><a href="{{route('kids.create')}}"><button class="btn">Dodaj dane dziecka</button></a></div>
    </div>
    <div class="flex items-center justify-center w-full col-start-3" style="text-align: center">
        <div class="grid grid-cols-3 place-items-stretch">
            @foreach($kids as $kid)
                <div>
                    <a href="{{route('kids.edit',$kid->id)}}"><button class="btn">{{$kid->first_name}}</button></a><br />
                </div>
                <div>
                    @if(is_null($kid->exam_photo))
                        <a href="{{url('user/kids/'.$kid->id.'/exam')}}">Wyniki egzaminu</a>
                    @else
                        Wypełnione
                    @endif
                </div>
                <div>
                    @if(is_null($kid->certificate_photo))
                    <a href="{{url('user/kids/'.$kid->id.'/certificate')}}">Świadectwo</a>
                    @else
                        Wypełnione
                    @endif
                </div>

            @endforeach
        </div>

    </div>
</div>

@include('footer.main')
