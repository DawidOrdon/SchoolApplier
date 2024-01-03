@include('.navbar.main')
<form method="post" action="{{url('/schools/'.$school_id.'/'.$class_id.'/applications/'.$app_id.'/certificate/save')}}">
    @csrf
    @method('post')
    <div class="flex items-center justify-center w-full">
        <div class="grid md:grid-cols-3 md:gap-6">
            <div class="grid md:grid-cols-1 md:gap-6 col-span-3">
                {{$app->first_name}} {{$app->last_name}}
            </div>
            <div class="relative z-0 w-1/4 mb-5 group row-span-5">
                <img src="/images/certificate1/{{$app->certificate_photo1}}" alt="" >
            </div>
            <div class="relative z-0 w-1/4 mb-5 group row-span-5">
                <img src="/images/certificate2/{{$app->certificate_photo2}}" alt="" >
            </div>
            @foreach($app->subjects as $subject)
                <div class="relative z-0 w-full mb-5 group">
                    <input type="text" name="rating[]" id="rating" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                           placeholder=" " required value="{{old('pl',$subject->value)}}"/>
                    <label for="voivodeship" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                        {{$subject->name}}
                    </label>
                </div>
            @endforeach
            <div class="grid md:grid-cols-1 md:gap-6">
                <button type="submit" class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center border-2">Submit</button>
            </div>
        </div>
    </div>
</form>
@include('.footer.main')

