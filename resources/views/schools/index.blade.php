@include('.navbar.main')
@can('add_school')
<a href="{{route('schools.create')}}" >
    <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
        Dodaj
    </button>
</a>
@endcan
@foreach($schools as $school)
    <div class="flex items-center justify-center w-full ">
        <a href="{{route('schools.show',$school->id)}}">
            <div class="w-4/5 grid grid-cols-4">
                <div class="w-5/6 content-center justify-center">
                    <img src="/images/schools/{{$school->img}}" alt="" width="80">
                </div>
                <div class="w-5/6 content-center justify-center">
                    <h1>{{$school->name}}</h1>
                </div>
                <div class="w-5/6 content-center justify-center break-normal">
                    {{$school->address}}<br />
                    {{$school->city}}<br />
                    {{$school->county}}<br />
                    {{$school->voivodeship}}<br />
                </div>
                <div class="w-5/6 content-center justify-center">
                    <h1>Profile</h1>
                </div>
            </div>
        </a>
    </div>
@endforeach


@include('.footer.main')
