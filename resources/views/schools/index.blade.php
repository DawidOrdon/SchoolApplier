@include('.navbar.main')
@can('add_school')
    <div class="flex items-center justify-center w-full ">
        <a href="{{route('schools.create')}}" >
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                Dodaj nową szkołę
            </button>
        </a>
    </div>
@endcan
<div class="flex items-center justify-center w-full ">
    <table>
    <tr><td colspan="4" class="text-2xl text-center p-3">Wybierz szkołę</td></tr>
@foreach($schools as $school)

    <tr onclick="window.location='{{ route('schools.show', $school->id) }}';" style="cursor:pointer;">
        <td class="p-2">
            <img src="/images/schools/{{$school->img}}" alt="" width="80">

        </td>
        <td class="p-2">
            <h1>{{$school->name}}</h1>
        </td>
        <td class="p-4">
            {{$school->address}}<br />
            {{$school->city}}<br />
            {{$school->county}}<br />
            {{$school->voivodeship}}<br />
        </td>
        <td class="p-4">
            <h1>Opis</h1>
            {{$school->desc}}
        </td>

    </tr>

@endforeach
    </table>
</div>

@include('.footer.main')
