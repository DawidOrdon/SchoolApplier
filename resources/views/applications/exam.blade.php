@include('.navbar.main')
<form method="post" action="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/'.$app_id.'/exam/save')}}">
    @csrf
    @method('post')
<div class="flex items-center justify-center w-full">

    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="grid md:grid-cols-1 md:gap-6 col-span-2">
            {{$app->first_name}} {{$app->last_name}}
        </div>
        <div class="relative z-0 w-full mb-5 group row-span-4">
            <img src="/images/exam/{{$app->exam_photo}}" alt="" >
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="pl" id="pl" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('pl',$app->exam_pl)}}"/>
            <label for="voivodeship" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Język polski
            </label>
            @if($errors->get('pl'))
                @foreach($errors->get('pl') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="fl" id="fl" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('fl',$app->exam_fl)}}"/>
            <label for="voivodeship" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Język obcy
            </label>
            @if($errors->get('fl'))
                @foreach($errors->get('fl') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <input type="text" name="mat" id="mat" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                   placeholder=" " required value="{{old('mat',$app->exam_mat)}}"/>
            <label for="voivodeship" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                Matematyka
            </label>
            @if($errors->get('mat'))
                @foreach($errors->get('mat') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
        <div class="grid md:grid-cols-1 md:gap-6">
            <button type="submit" class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center border-2">Submit</button>
        </div>
    </div>
</div>
</form>
@include('.footer.main')

