@include('.navbar.main')
<div class="flex items-center justify-center p3">
    <a href="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/lists/export_csv')}}">
        <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
            Generuj plik csv do e-edziennika
        </button>
    </a>
</div>
<div class="grid grid-cols-3">

<div>
<div class="flex items-center justify-center p3 p-3 text-2xl">
    Lista przyjętych osób
</div>
<div class="flex items-center justify-center p3 w-full p-3">

    <table>
        <tr>
            <th>Imię</th>
            <th>Drugie imię</th>
            <th>Nazwisko</th>
        </tr>
        @php($count=0)
        @foreach($applications_accept as $app)
            <tr>
                <td>{{$app->first_name}}</td>
                <td>{{$app->second_name}}</td>
                <td>{{$app->last_name}}</td>
            </tr>
            @php($count++)
            @if($count==$slots)
                </table>
            </div>
</div>
    <div>
            <div class="flex items-center justify-center p3 p-3 text-2xl">
                Lista nieprzyjętych osób
            </div>
            <div class="flex items-center justify-center p3 p-3">

                <table>
                    <tr>
                        <th>Imię</th>
                        <th>Drugie imię</th>
                        <th>Nazwisko</th>
                    </tr>
            @endif
        @endforeach
    </table>
    </div>
    </div>
    <div>
<div class="flex items-center justify-center p3 p-3 text-2xl">
    Lista niezakwalyfikowanych osób
</div>
    <div class="flex items-center justify-center ">

    <table>
        <tr>
            <th>Imię</th>
            <th>Drugie imię</th>
            <th>Nazwisko</th>
        </tr>
        @php($count=0)
        @foreach($applications_rejected as $app)
            <tr>
                <td>{{$app->first_name}}</td>
                <td>{{$app->second_name}}</td>
                <td>{{$app->last_name}}</td>
            </tr>
        @endforeach
    </table>
</div>
</div>
</div>
@include('.footer.main')
