@include('.navbar.main')
@foreach($schools as $school)
<div class="w-full block items-center justify-center" >
    <div class="w-full p-10 flex items-center justify-center">
        <a href="{{route('schools.edit',$school->id)}}">
            <div class="w-1/6 flex items-center justify-center cursor-pointer" id="edit_btn">
                Edycja danych szkoły
            </div>
        </a>
    </div>
    <div class="w-full p-10 flex items-center justify-center">
        <div class="w-1/6 flex items-center justify-center">
            Klasy w Twojej szkole
        </div>
        <a href="{{route('classes.create',$school->id)}}">
            <div class="w-1/6 flex items-center justify-center">
                Dodaj klase
            </div>
        </a>
    </div>
    <div class="w-full p-10 flex items-center justify-center">
        <div class="w-1/6 flex items-center justify-center" id="new_class_btn">
            @foreach($classes as $class)
                {{$class->name}}
            @endforeach
        </div>
    </div>
    <div class="w-full p-10 flex items-center justify-center">
        <div class="w-1/6 flex items-center justify-center" id="new_class_btn">
            <a href="{{url('/schools/'.$school->id.'/edit/languages')}}">Języki oferowane przez szkołę</a>
        </div>
        @foreach($languages as $language)
            <div class="w-1/6 flex items-center justify-center" id="new_class_btn">
                {{$language->name}}
                <form method="post" action="{{url('/schools/'.$school->id.'/edit/languages/delete')}}">
                    @csrf
                    <input type="hidden" name="lang_id" value="{{$language->id}}">
                    <button type="submit" style="color:red">Usun</button>
                </form>
            </div>
        @endforeach
    </div>
</div>
@endforeach
@include('.footer.main')

