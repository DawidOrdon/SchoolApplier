@include('.navbar.main')
<div class="w-full block items-center justify-center" >
    <div class="w-full p-10 flex items-center justify-center">
        <div class="w-1/6 flex items-center justify-center cursor-pointer" id="edit_btn">
            Dostępne kierunki
        </div>
        @foreach($classes as $class)
            <div class="w-1/6 flex items-center justify-center" id="edit_btn">
                {{$class->name}}<a href="{{url('/schools/'.$school_id.'/'.$class->id.'/application')}}"> Aplikuj </a>
            </div>
        @endforeach


    </div>

</div>
@include('.footer.main')

