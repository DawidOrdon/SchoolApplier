@include('.navbar.main')
<form class="max-w-md mx-auto w-1/3 text-black" action="{{url('/schools/unlock')}}" method="post" enctype="multipart/form-data">
    @method('post')
    @csrf
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="id" id="id" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
               placeholder=" " required value="{{old('id')}}"/>
        <label for="id" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
            id podania</label>
        @if($errors->get('id'))
            @foreach($errors->get('id') as $error)
                <li>{{$error}}</li>
            @endforeach
        @endif
    </div>
    <div class="relative z-0 w-full mb-5 group">
        <input type="text" name="pass" id="pass" class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
               placeholder=" " required value="{{old('pass')}}"/>
        <label for="pass" class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
            hasło</label>
        @if($errors->get('pass'))
            @foreach($errors->get('pass') as $error)
                <li>{{$error}}</li>
            @endforeach
        @endif
    </div>
    <div class="grid md:grid-cols-1 md:gap-6">
        <button type="submit" class="text-black focus:ring-4 focus:outline-none font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center border-2">Submit</button>
    </div>
    <div class="grid md:grid-cols-1 md:gap-6">
        @if (Session::has('unlock_success'))
            <div class="alert alert-success">
                {{ Session::get('unlock_success') }}
            </div>
        @endif
    </div>
</form>
@include('.footer.main')

