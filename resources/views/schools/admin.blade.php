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
            Dodaj nową klase
        </div>
    </div>
    <div class="items-center justify-center w-full" id="new_class_form">

    </div>
</div>
@endforeach
@include('.footer.main')

