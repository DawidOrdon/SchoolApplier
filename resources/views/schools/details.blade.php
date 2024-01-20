@include('.navbar.main')
<div class="w-full block items-center justify-center" >
    <div class="w-full p-10 flex items-center justify-center">
        <div class="w-1/6 flex items-center justify-center" id="edit_btn">
            Dostępne kierunki
        </div>
        @foreach($classes as $class)
            <div class="w-1/6 flex items-center justify-center" id="edit_btn">
                <a href="{{url('/schools/'.$school_id.'/'.$class->id.'/application')}}">
                    {{$class->name}}
                    <button class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow">
                        Aplikuj
                    </button>
                </a>
            </div>
        @endforeach


    </div>

</div>
@include('.footer.main')

