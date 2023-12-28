@include('navbar.main')
<div class="flex items-center justify-center w-full">
    Edytuj swoje dane
</div>

<div class="flex items-center justify-center w-full" >
    @foreach($user as $data)
        <form class="max-w-md mx-auto w-1/3 text-black" action="{{route('schools.store')}}" method="post" enctype="multipart/form-data">
            @method('post')
            @csrf

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="first_name" id="first_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('first_name')}}"/>
                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Imię</label>
                @if($errors->get('email'))
                    @foreach($errors->get('email') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>

            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="last_name" id="last_name" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                       placeholder=" " required value="{{old('last_name')}}"/>
                <label for="email" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
                    Nazwisko</label>
                @if($errors->get('email'))
                    @foreach($errors->get('email') as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @endif
            </div>

        </form>
    @endforeach
</div>


@include('footer.main')
