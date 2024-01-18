@include('.navbar.main')
<div class="relative z-0 w-full mb-5 group">
    <a href="{{url('/schools/'.$school_id.'/'.$class_id.'/applications')}}">Powrót</a>
</div>
<div class="relative z-0 w-full mb-5 group">
    <table>
        <tr>
            <th>imie</th>
            <th>nazwisko</th>
            <th>Punkty z egzaminu</th>
            <th>Punkty z świadectwa</th>
            <th>Dodatkowe</th>
            <th>Suma</th>
        </tr>
        @foreach($applications as $application)
            <tr>
                <td>
                    {{$application->first_name}}
                </td>
                <td>
                    {{$application->last_name}}
                </td>
                @if($application->exam_points>0)
                    <td>
                        {{$application->exam_points}}
                    </td>
                @elseif(!is_null($application->exam_photo))
                    <td style="color:green">
                        <a href="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/'.$application->id.'/exam')}}">potwierdz</a>
                    </td>
                @else
                    <td style="color:gray">
                        <a href="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/'.$application->id.'/exam')}}">dodaj</a>
                    </td>
                @endif
                @if($application->certificate_points>0)
                    <td>
                        {{$application->certificate_points}}
                    </td>
                @elseif(!is_null($application->certificate_photo1))
                    <td style="color:green">
                        <a href="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/'.$application->id.'/certificate')}}">potwierdz</a>
                    </td>
                @else
                    <td style="color:gray">
                        <a href="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/'.$application->id.'/certificate')}}">dodaj</a>
                    </td>
                @endif
                @if($application->bonus_points>0)
                    <td>
                        {{$application->bonus_points}}
                    </td>
                @elseif(!is_null($application->certificate_photo))
                    <td style="color:green">
                        <a href="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/'.$application->id.'/add_info')}}">potwierdz</a>
                    </td>
                @else
                    <td style="color:gray">
                        <a href="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/'.$application->id.'/add_info')}}">dodaj</a>
                    </td>
                @endif
                <td>
                    {{$application->bonus_points+$application->certificate_points+$application->exam_points}}
                </td>
                <td>
                    <a href="{{url('/app/'.$application->id.'/restore')}}" onclick="return confirm('Czy chcesz przywrócić podanie kandydata: {{$application->first_name}} {{$application->last_name}} ?')">Przywróć</a>
                </td>

            </tr>


        @endforeach
    </table>
</div>
@include('.footer.main')

