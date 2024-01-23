@include('.navbar.main')
@foreach($schools as $school)
<div class="w-full block items-center justify-center" >
    <div class="w-full p-10 flex items-center justify-center">
            <div class="w-1/6 flex items-center justify-center" id="edit_btn">
               dane szkoły
            </div>
        <a href="{{route('schools.edit',$school->id)}}">
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                edytuj
            </button>
        </a>
    </div>
    <div class="w-full p-10 flex items-center justify-center">
        <div class="w-1/6 flex items-center justify-center">
            Klasy w Twojej szkole
        </div>
        <a href="{{route('classes.create',$school->id)}}">
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                Dodaj klase
            </button>
        </a>
    </div>
    @foreach($classes as $class)
    <div class="w-full p-2 flex items-center justify-center">
        <div class="w-1/6 flex items-center justify-center" id="new_class_btn">
            <a href="{{url('schools/'.$school->id.'/'.$class->id.'/applications')}}">{{$class->name}}</a>
        </div>
        <a href="{{route('classes.edit',[$school->id,$class->id])}}">
            <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                Edytuj klasę
            </button>
        </a>
    </div>
    @endforeach
    <div class="w-full p-10 flex items-center justify-center">
        <div class="w-1/6 flex items-center justify-center text-center" id="new_class_btn">
            <a href="{{url('/schools/'.$school->id.'/edit/languages')}}">
                Języki oferowane przez szkołę <br />
                <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow mt-2">
                    Dodaj
                </button>
            </a>
        </div>
        <div class="w-1/6 flex items-center justify-center" id="new_class_btn">
            <table>
        @foreach($languages as $index=>$language)
            <tr class="{{ $index % 2 === 1 ? 'bg-gray-200' : 'bg-white' }}">
                <td class="pr-8">{{$language->name}}</td>
                <td class="p-2 pl-4">
                <form method="post" action="{{url('/schools/'.$school->id.'/edit/languages/delete')}}">
                    @csrf
                    <input type="hidden" name="lang_id" value="{{$language->id}}">
                    <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-1 px-1 border border-gray-400 rounded shadow" onclick="return confirm('Czy na pewno chcesz usunąć język ')">
                        Usuń
                    </button>
                </form>
                </td>
            </tr>
        @endforeach
            </table>
        </div>
    </div>
</div>
@endforeach
@include('.footer.main')

