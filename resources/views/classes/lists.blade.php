@include('.navbar.main')
<div class="relative z-0 w-full mb-5 group">
    <a href="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/lists/export_csv')}}">Generuj plik csv do e-edziennika</a>
</div>
<div class="flex items-center justify-center p3">
    Lista przyjętych osób
</div>
<div class="flex items-center justify-center p3">

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
            <div class="flex items-center justify-center p3">
                Lista nieprzyjętych osób
            </div>
            <div class="flex items-center justify-center p3">

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
<div class="flex items-center justify-center p3">
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

@include('.footer.main')
