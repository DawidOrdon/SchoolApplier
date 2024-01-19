@include('.navbar.main')
@can('add_school')
<a href="{{route('schools.create')}}" >
    <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
        Dodaj
    </button>
</a>
@endcan
<div class="flex items-center justify-center w-full ">
    <table>
@foreach($schools as $school)

    <tr onclick="window.location='{{ route('schools.show', $school->id) }}';" style="cursor:pointer;">
        <td>
            <img src="/images/schools/{{$school->img}}" alt="" width="80">

        </td>
        <td>
            <h1>{{$school->name}}</h1>
        </td>
        <td>
            {{$school->address}}<br />
            {{$school->city}}<br />
            {{$school->county}}<br />
            {{$school->voivodeship}}<br />
        </td>
        <td>
            <h1>Opis</h1>
            {{$school->desc}}
        </td>

    </tr>

@endforeach
    </table>
</div>

@include('.footer.main')
