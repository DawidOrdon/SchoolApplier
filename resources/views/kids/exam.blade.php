@include('.navbar.main')
<div class="flex items-center justify-center w-full">

    <form class="max-w-md mx-auto w-1/3 text-black" action="{{url('user/kids/'.$kid->id.'/exam_store')}}" method="post" enctype="multipart/form-data">
        @method('post')
        @csrf
{{--    Język polski--}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="pl" id="pl" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('pl')}}"/>
            <label for="pl" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Język polski
            </label>
            @if($errors->get('pl'))
                @foreach($errors->get('pl') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
{{--    Język obcy--}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="fl" id="fl" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('fl')}}"/>
            <label for="fl" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Język obcy
            </label>
            @if($errors->get('pl'))
                @foreach($errors->get('pl') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
{{--    Matematyka--}}
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="mat" id="mat" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('mat')}}"/>
            <label for="mat" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Matematyka
            </label>
            @if($errors->get('mat'))
                @foreach($errors->get('mat') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
{{--    zdjęcie--}}
        <div class="relative z-0 w-full mb-5 group">
            Zdjęcie potweirdzające wynik
        </div>
        <div class="grid md:grid-cols-1 md:gap-6">
            <div class="flex items-center space-x-6">
                <div class="shrink-0">
                    <img id='preview_img1' class="h-16 w-16 object-cover rounded-full" src="" alt="img" />
                </div>
                <label class="block">
                    <span class="sr-only">Zdjęcie potweirdzające wynik</span>
                    <input type="file" name="image" onchange="loadFile(event,'preview_img1')" class="block w-full text-sm text-slate-500
                            file:mr-4 file:py-2 file:px-4
                            file:rounded-full file:border-0
                            file:text-sm file:font-semibold
                            file:bg-violet-50 file:text-violet-700
                            hover:file:bg-violet-100
                          " />
                </label>
            </div>
        </div>

        <div class="grid md:grid-cols-1 md:gap-6">
            <button type="submit" class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center border-2">Submit</button>
        </div>
    </form>
</div>

<script>
    var loadFile = function(event,name) {

        var input = event.target;
        var file = input.files[0];
        var type = file.type;

        var output = document.getElementById(name);

        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };
</script>
@include('.footer.main')
