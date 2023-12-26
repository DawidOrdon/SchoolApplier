@include('.navbar.main')
<form class="max-w-md mx-auto w-1/3 text-black" action="{{route('classes.store',$school_id)}}" method="post" enctype="multipart/form-data">
    @method('post')
    @csrf

    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="class_name" id="class_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('class_name')}}"/>
        <label for="class_name" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Nazwa klasy</label>
        @if($errors->get('school_name'))
            @foreach($errors->get('school_name') as $error)
                <li>{{$error}}</li>
            @endforeach
        @endif
    </div>

    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="desc" id="desc" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('desc')}}"/>
        <label for="desc" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Opis klasy</label>
        @if($errors->get('url'))
            @foreach($errors->get('url') as $error)
                <li>{{$error}}</li>
            @endforeach
        @endif
    </div>



    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <input type="number" name="slots" id="slots" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " required value="{{old('slots')}}"/>
            <label for="slots" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Ilość miejsc</label>
            @if($errors->get('address'))
                @foreach($errors->get('address') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
        <div class="relative z-0 w-full mb-5 group">
            <label for="school_type" class="sr-only">school_type</label>
            <select id="school_type" name="school_type" required class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option selected>Wybierz typ szkoły</option>
                @foreach($schools_types as $school_type)
                    <option value="{{$school_type->id}}">{{$school_type->name}}</option>
                @endforeach
            </select>
            @if($errors->get('city'))
                @foreach($errors->get('city') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>
    </div>

    <div class="grid md:grid-cols-2 md:gap-6">
        <div class="relative z-0 w-full mb-5 group">
            <label for="subject1" class="sr-only">subject1</label>
            <select id="subject1" name="subject1" required class="block py-2.5 px-0 w-full text-sm text-gray-500 bg-transparent border-0 border-b-2 border-gray-200 appearance-none dark:text-gray-400 dark:border-gray-700 focus:outline-none focus:ring-0 focus:border-gray-200 peer">
                <option selected>Wybierz typ szkoły</option>
                @foreach($schools_types as $school_type)
                    <option value="{{$school_type->id}}">{{$school_type->name}}</option>
                @endforeach
            </select>
            @if($errors->get('city'))
                @foreach($errors->get('city') as $error)
                    <li>{{$error}}</li>
                @endforeach
            @endif
        </div>

    </div>

    <div class="grid md:grid-cols-1 md:gap-6">
        <button type="submit" class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center border-2">Submit</button>
    </div>
</form>
@include('.footer.main')
