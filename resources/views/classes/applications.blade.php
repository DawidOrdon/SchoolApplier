@include('.navbar.main')
<div class="flex items-center justify-center p3">
    <a href="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/restore')}}">
        <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
            Przywracanie kandydata
        </button>
    </a>
    <a href="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/lists')}}">
        <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
            Wygeneruj listy
        </button>
    </a>
</div>

<div class="flex items-center justify-center p3">
    <table>
        <tr>
            <th>imie</th>
            <th>nazwisko</th>
            <th>Punkty z egzaminu</th>
            <th>Punkty z świadectwa</th>
            <th>Dodatkowe</th>
            <th>Suma</th>
        </tr>
    @foreach($applications as $index=>$application)
        <tr class="{{ $index % 2 === 1 ? 'bg-gray-200' : 'bg-white' }}">
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
                <a href="{{url('/app/'.$application->id.'/drop')}}" onclick="return confirm('Czy chcesz odrzucić podanie kandydata: {{$application->first_name}} {{$application->last_name}}')">
                    <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-4 border border-gray-400 rounded shadow">
                        odrzuć
                    </button>
                </a>
            </td>

        </tr>


    @endforeach
    </table>
</div>
@include('.footer.main')

